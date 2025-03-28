// Accordion

const accordion = () => {

  const accordianItemHeaders = document.querySelectorAll(
    ".accordian-item-header"
  );
  
  accordianItemHeaders.forEach(accordianItemHeader => {
    accordianItemHeader.addEventListener("click", () => {
      const current = document.querySelector(".accordian-item-header.active");
  
      if (current && current !== accordianItemHeader) {
        current.classList.toggle("active");
        current.nextElementSibling.style.maxHeight = 0;
      }
      accordianItemHeader.classList.toggle("active");
  
      const accordianItemBody = accordianItemHeader.nextElementSibling;
  
      if (accordianItemHeader.classList.contains("active")) {
        accordianItemBody.style.maxHeight = accordianItemBody.scrollHeight + "px";
      } else {
        accordianItemBody.style.maxHeight = 0;
      }
    });
  });
  }
  
  
export default accordion