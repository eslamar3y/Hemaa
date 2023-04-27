<div class="floating-btn">
    <button id="btn-toggle" style="font-size: 16px">مساعده</button>
    <div id="btn-container">
      <button id="btn-spacing" style="font-size: 16px; margin-top:15px">تباعد النص</button>
      <hr>
      <button id="btn-links" style="font-size: 16px">ابراز الروابط</button>
      <hr>
      <button id="btn-font" style="font-size: 16px; margin-bottom:15px">نص اكبر</button>
    </div>
  </div>
  <style>
    .floating-btn {
  position: fixed;
  bottom: 30%;
  right: 20px;
  z-index: 1000;
}

#btn-toggle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background-color: rgb(67, 67, 231);
  color: white;
  /* font-size: 16px; */
  border: none;
  cursor: pointer;
}

#btn-container {
  display: none;
  position: absolute;
  bottom: 80px;
  right: 0;
  width: 150px;
  border: 1px solid #ccc;
  background-color: white;
  border-radius: 25px;
  animation: fadeIn 0.5s ease-in-out forwards;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translate(20px, 30px);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}

#btn-container button {
  display: block;
  width: 100%;
  padding: 10px;
  border: none;
  background-color: transparent;
  cursor: pointer;
}

#btn-container button:hover {
  color: #0257ee;
}
.show {
  display: inline-block !important;
}
.showLiks {
  background-color: black !important;
  color: yellow !important;
  text-decoration: underline !important;
}

.size1 {
  font-size: 1.5rem !important;
}
.size2 {
  font-size: 2rem;
}
  </style>
  <script>
    const btnToggle = document.getElementById("btn-toggle");
const btnSpacing = document.getElementById("btn-spacing");
const btnLinks = document.getElementById("btn-links");
const btnFont = document.getElementById("btn-font");
const btnContainer = document.getElementById("btn-container");
const html = document.querySelector("html");
const body = document.querySelector("body");
const links = document.querySelectorAll("a");
const logoname = document.getElementById("logoname");
const aboutPara = document.getElementById("aboutPara");

btnToggle.addEventListener("click", () => {
  btnContainer.classList.toggle("show");
});
var flag = 0;
btnSpacing.addEventListener("click", () => {
  if (flag == 0) {
    body.style.letterSpacing = "3px";
    flag = 1;
  } else if (flag == 1) {
    body.style.letterSpacing = "5px";
    flag = 2;
  } else if (flag == 2) {
    body.style.letterSpacing = "7px";
    flag = 3;
  } else if (flag == 3) {
    body.style.letterSpacing = "0px";
    flag = 0;
  }
});
var flaglinks = 0;
btnLinks.addEventListener("click", () => {
  if (flaglinks == 0) {
    links.forEach((link) => {
      link.classList.add("showLiks");
      logoname.style.color = "yellow";
      flaglinks = 1;
    });
  } else if (flaglinks == 1) {
    links.forEach((link) => {
      link.classList.remove("showLiks");
      logoname.style.color = "#012970";
      flaglinks = 0;
    });
  }
});

var flagsize = 0;
btnFont.addEventListener("click", () => {
  if (flagsize == 0) {
    html.classList.add("size1");
    aboutPara.style.wordSpacing = "13px";
    aboutPara.style.lineHeight = "30px";
    flagsize = 1;
  } else if (flagsize == 1) {
    html.classList.remove("size1");
    aboutPara.style.wordSpacing = "16px";
    aboutPara.style.lineHeight = "34px";
    html.classList.add("size2");
    flagsize = 2;
  } else if (flagsize == 2) {
    aboutPara.style.wordSpacing = "0";
    aboutPara.style.lineHeight = "24px";
    html.classList.remove("size2");
    flagsize = 0;
  }
});
  </script>