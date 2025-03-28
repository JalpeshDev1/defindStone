const video = () => {

    const videoBlock = document.querySelector('.video-block');
    const videoModal = document.querySelector('.video-modal');
    const modalClose = document.querySelector('.modal-close');
  
    if (videoBlock && videoModal) {
      videoBlock.addEventListener('click', function(e) {
        e.preventDefault();
        videoModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      });
    }
  
    if (modalClose && videoModal) {
      modalClose.addEventListener('click', function(e) {
        e.preventDefault();
        videoModal.classList.add('hidden');
        document.body.style.overflow = '';
      });
    }
  
    if (videoModal) {
      videoModal.addEventListener('click', function(e) {
        if (e.target === videoModal) {
          videoModal.classList.add('hidden');
          document.body.style.overflow = '';
        }
      });
    }
}


export default video