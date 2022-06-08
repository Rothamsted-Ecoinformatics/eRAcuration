import Alpine from 'alpinejs';
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm';
import ToastComponent from '../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts'
import Editor from '@toast-ui/editor'

Alpine.plugin(FormsAlpinePlugin);

Alpine.data('ToastComponent', ToastComponent);

window.Alpine = Alpine;
Alpine.start();


const editor = new Editor({
    el: document.querySelector('#editor'),
    height: '600px',
    initialEditType: 'markdown',
    previewStyle: 'vertical'
  });