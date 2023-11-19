// myscript.js

window.onload = function () {
    setTimeout(function () {
        document.querySelector('.spinner').style.display = 'none';
        document.getElementById('myImage').classList.add('visible');
        setTimeout(function () {
            document.getElementById('myImage').classList.remove('visible');
            document.getElementById('myImage').classList.add('hidden');
            setTimeout(function () {
                document.querySelector('.logingeral').style.display = 'inline-flex';
                document.getElementById('bodyauxiliar').style.display = 'none';
            }, 1000);
        }, 1000);
    }, 1000);
};
