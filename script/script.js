document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab");
    const wrapper = document.querySelector(".wrapper");
  
    const nearestImages = [
      "img/Rectangle 32.png",
      "img/Rectangle 33.png",
      "img/Rectangle 34.png",
      "img/Rectangle 35.png"
    ];
  
    const soonImages = [
        "img/SL.jpg",
        "img/ID.jpg",
        "img/PW.jpg",
        "img/LP.jpg"
    ];
  
    function showImages(images) {
      wrapper.innerHTML = "";
      images.forEach(image => {
        const imgElement = document.createElement("img");
        imgElement.src = image;
        wrapper.appendChild(imgElement);
      });
      wrapper.classList.add("active");
    }
  
    tabs.forEach(tab => {
      tab.addEventListener("click", function() {
        // Удаляем класс active у всех вкладок
        tabs.forEach(tab => tab.classList.remove("active"));
        // Добавляем класс active только к текущей вкладке
        this.classList.add("active");
        
        // Определяем, какой набор изображений нужно показать в зависимости от нажатой вкладки
        if (this.id === "nearestButton") {
          showImages(nearestImages);
        } else if (this.id === "soonButton") {
          showImages(soonImages);
        }
      });
    });
  });
  