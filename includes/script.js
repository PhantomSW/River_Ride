

function myFunction() {
    var element = document.body;
    element.classList.toggle("color-mode");
    const b1 = document.getElementById('button1');
    const b2 = document.getElementById('button2');
    const mid = document.getElementById('continue');
    const tab = document.getElementsByName('th');
    tab.classList.toggle('color-mode');
    b1.classList.toggle('color-mode');
    b2.classList.toggle('color-mode');
    mid.classList.toggle('color-mode');
}

function openNav() {
    document.getElementById("sidenav").style.width = "150px";
  }
  
  function closeNav() {
    document.getElementById("sidenav").style.width = "0";
  }
  

async function search() {
    const input = document.getElementById('ajaxInput');
    const name = input.value;
    try {
        const res = await fetch('api/search.php?name=' + name);
        const str = await res.text();
        const burger = document.getElementById('tab');
        burger.innerHTML = str;
    } catch(err) {
        alert('bug');
    }
}