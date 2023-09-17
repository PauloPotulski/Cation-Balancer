let qtd = 0;
function abrir_menu() {
    qtd++;
    if (qtd % 2 == 1) {
        document.getElementById("informacoes").style.display = 'block';
        document.getElementById("rank").style.display = 'block';
        document.getElementById("sobre").style.display = 'block';
        document.getElementById("logout").style.display = 'block';
    }
    else {
        document.getElementById("informacoes").style.display = 'none';
        document.getElementById("rank").style.display = 'none';
        document.getElementById("sobre").style.display = 'none';
        document.getElementById("logout").style.display = 'none';
    }

}
//verifica se o dispositivo é movel
if (navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)
) {
    document.getElementById("informacoes").style.display = 'none';
    document.getElementById("rank").style.display = 'none';
    document.getElementById("sobre").style.display = 'none';
    document.getElementById("logout").style.display = 'none';
}

function trocar_menu_inf(){
    document.getElementById("titulo").innerHTML = "Informações";
}
function trocar_menu_rank(){
    document.getElementById("titulo").innerHTML = "Rank";
}

// sessão da imagem de perfil "input"

const inputFile = document.querySelector('#pic_input');
const pictureImage = document.querySelector('.picture_image');
const pictureImageText = 'Escolha uma imagem';
pictureImage.innerHTML = pictureImageText;

inputFile.addEventListener('change', function(e){
    const inputTarget = e.target;
    const file = inputTarget.files[0];
    
    if(file){
        const reader = new FileReader();
        reader.addEventListener('load', function(e){
            const readerTarget = e.target;
            const img = document.createElement('img');
            img.src = readerTarget.result;
            img.classList.add('foto_perfil_config');
            
            pictureImage.innerHTML = '';
            pictureImage.appendChild(img);
        });
        reader.readAsDataURL(file);
        
    }
    else{
        pictureImage.innerHTML = pictureImageText;
    }
});

