var headings = document.getElementsByClassName('formations-headings');
var i=0;
var formations = document.getElementsByClassName('formations');
var links = document.getElementsByClassName('formations-links');
var images = ['training_icon2.png','icone-demarche-1.png','distance-learning.jpg','e-learning-icon.png'];
for(i=0;i<links.length;i++){
	links[i].classList.toggle('text-green');
}

for(i=0;i<formations.length;i++){
	formations[i].classList.toggle('mx-5');
	formations[i].classList.add('my-5');
	var img = document.createElement('img');
	var div = document.createElement('div');
	div.className="img w-25";
	img.src = "../formations-img/" + images[i];
	img.className="formations-img"
	img.alt = "formations";
	img.classList.add('w-50');
	img.classList.add('h-50');
	div.appendChild(img);
	formations[i].appendChild(div);
}

for(i=0;i<headings.length;i++){
	headings[i].classList.toggle('py-3');
}


