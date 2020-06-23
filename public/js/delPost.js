(function() {
  'use strict';

  const delBtn = document.getElementById('del');

  delBtn.addEventListener('click', function(e) {
    e.preventDefault();
    if (confirm('削除してもよろしいですか？')) {
      document.getElementById('del_' + this.dataset.id).submit();
    }
  });
})();
