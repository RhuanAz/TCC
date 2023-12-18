flatpickr("#datetime", {
    width: "100px",
    dateFormat: "d-m-Y",
    minDate: "today",
    locale: "pt",
});

document.addEventListener('DOMContentLoaded', function () {
    const flatpickrCalendar = document.querySelector(".flatpickr-calendar");
    if (flatpickrCalendar) {
      flatpickrCalendar.style.width = "auto"; // Permite que a largura seja ajustada automaticamente
    }
});