import './bootstrap';

import Alpine from 'alpinejs';

import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';

window.Alpine = Alpine;

Alpine.start();

let editorElement = document.querySelector('#editor');

let editor;

if (editorElement) {
  editor = new Editor({
    el: editorElement,
    height: '400px',
    initialEditType: 'markdown',
    placeholder: 'Write something cool!',
  })
}

const createForm = document.querySelector('#createArticleForm');
const editForm = document.querySelector('#editArticleForm');

if (createForm) {
  document.querySelector('#createArticleForm').addEventListener('submit', e => {
    e.preventDefault();
    document.querySelector('#full_text').value = editor.getMarkdown();
    e.target.submit();
  });
}

if (editForm) {
  let editorInput = document.querySelector('#full_text');
  editor.setMarkdown(document.querySelector('#full_text').value);

  editForm.addEventListener('submit', e => {
    e.preventDefault();
    document.querySelector('#full_text').value = editor.getMarkdown();
    e.target.submit();
  });
}