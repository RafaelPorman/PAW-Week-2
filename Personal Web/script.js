const clock = document.querySelector("#clock");
const date = document.querySelector("#date");
const year = document.querySelector("#year");
const timezone = "Asia/Jakarta";

function updateDateTime() {
  const now = new Date();
  clock.textContent = new Intl.DateTimeFormat("id-ID", {
    timeZone: timezone, hour: "2-digit", minute: "2-digit", second: "2-digit",
    hour12: false,
  }).format(now);
  date.textContent = new Intl.DateTimeFormat("id-ID", {
    timeZone: timezone, weekday: "long", day: "numeric", month: "long", year: "numeric",
  }).format(now);
  year.textContent = new Intl.DateTimeFormat("id-ID", {
    timeZone: timezone, year: "numeric",
  }).format(now);
}

updateDateTime();
window.setInterval(updateDateTime, 1000);
