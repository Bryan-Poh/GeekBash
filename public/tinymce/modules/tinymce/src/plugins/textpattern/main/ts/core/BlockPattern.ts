/**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 */

import { Node } from '@ephox/dom-globals';
import { Arr, Option, Unicode } from '@ephox/katamari';
import DOMUtils from 'tinymce/core/api/dom/DOMUtils';
import Editor from 'tinymce/core/api/Editor';
import Tools from 'tinymce/core/api/util/Tools';
import * as Settings from '../api/Settings';
import * as TextSearch from '../text/TextSearch';
import { generatePathRange, resolvePathRange } from '../utils/PathRange';
import * as Utils from '../utils/Utils';
import { BlockPattern, BlockPatternMatch, Pattern } from './PatternTypes';

const stripPattern = (dom: DOMUtils, block: Node, pattern: BlockPattern) => {
  // The pattern could be across fragmented text nodes, so we need to find the end
  // of the pattern and then remove all elements between the start/end range
  const firstTextNode = TextSearch.textAfter(block, 0, block);
  firstTextNode.each((spot) => {
    const node = spot.container;
    TextSearch.scanRight(node, pattern.start.length, block).each((end) => {
      const rng = dom.createRng();
      rng.setStart(node, 0);
      rng.setEnd(end.container, end.offset);

      Utils.deleteRng(dom, rng, (e: Node) => e === block);
    });
  });
};

const applyPattern = (editor: Editor, match: BlockPatternMatch): boolean => {
  const dom = editor.dom;
  const pattern = match.pattern;
  const rng = resolvePathRange(dom.getRoot(), match.range).getOrDie('Unable to resolve path range');

  Utils.getParentBlock(editor, rng).each((block) => {
    if (pattern.type === 'block-format') {
      if (Utils.isBlockFormatName(pattern.format, editor.formatter)) {
        editor.undoManager.transact(() => {
          stripPattern(editor.dom, block, pattern);
          editor.formatter.apply(pattern.format);
        });
      }
    } else if (pattern.type === 'block-command') {
      editor.undoManager.transact(() => {
        stripPattern(editor.dom, block, pattern);
        editor.execCommand(pattern.cmd, false, pattern.value);
      });
    }
  });

  return true;
};

// Finds a matching pattern to the specified text
const findPattern = <P extends Pattern>(patterns: P[], text: string): Option<P> => {
  const nuText = text.replace(Unicode.nbsp, ' ');
  return Arr.find(patterns, (pattern) => {
    if (text.indexOf(pattern.start) !== 0 && nuText.indexOf(pattern.start) !== 0) {
      return false;
    }

    return true;
  });
};

const findPatterns = (editor: Editor, patterns: BlockPattern[]): BlockPatternMatch[] => {
  const dom = editor.dom;
  const rng = editor.selection.getRng();

  return Utils.getParentBlock(editor, rng).filter((block) => {
    const forcedRootBlock = Settings.getForcedRootBlock(editor);
    const matchesForcedRootBlock = forcedRootBlock === '' && dom.is(block, 'body') || dom.is(block, forcedRootBlock);
    return block !== null && matchesForcedRootBlock;
  }).bind((block) => {
    // Get the block text
    const blockText = block.textContent;

    // Find the pattern
    const matchedPattern = findPattern(patterns, blockText);
    return matchedPattern.map((pattern) => {
      if (Tools.trim(blockText).length === pattern.start.length) {
        return [];
      }

      return [{
        pattern,
        range: generatePathRange(dom.getRoot(), block, 0, block, 0)
      }];
    });
  }).getOr([]);
};

const applyMatches = (editor: Editor, matches: BlockPatternMatch[]) => {
  if (matches.length === 0) {
    return;
  }

  // Store the current selection and then apply the matched patterns
  const bookmark = editor.selection.getBookmark();
  Arr.each(matches, (match) => applyPattern(editor, match));
  editor.selection.moveToBookmark(bookmark);
};

export { applyMatches, findPattern, findPatterns };
