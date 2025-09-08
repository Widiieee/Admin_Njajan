document.addEventListener('DOMContentLoaded', function(){
  const btn = document.getElementById('btn-toggle');
  const sidebar = document.getElementById('admin-sidebar');

  if(btn && sidebar){
    btn.addEventListener('click', () => {
      sidebar.classList.toggle('show');
    });

    // close sidebar if clicked outside (mobile)
    document.addEventListener('click', (e) => {
      if(window.innerWidth <= 700){
        if(!sidebar.contains(e.target) && !btn.contains(e.target)){
          sidebar.classList.remove('show');
        }
      }
    });
  }
});
