(function() {
  'use strict';

  const cmtDelBtns = document.querySelectorAll('.del_cmt');

  cmtDelBtns.forEach((cmtDelBtn) => {
    cmtDelBtn.addEventListener('click', function(e) {
      e.preventDefault();
      if (confirm('削除してもよろしいですか？')) {
        document.getElementById('cmt_' + this.dataset.id).submit();
      }
    });
  });

})();