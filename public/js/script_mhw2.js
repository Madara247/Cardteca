

const Checked_image = "Immagini/MiniGame/checked.png";
const Uncheched_image = "Immagini/MiniGame/unchecked.png";
const riqSel = {"one": null, "two": null, "three": null} 

function ElementoCliccato(Riquadro){	
	const Checks = Riquadro.querySelector('.checkbox');
	Checks.src = Checked_image;
	Riquadro.style.backgroundColor = "#cfe3ff";
	Riquadro.style.opacity = 1;
}

function stilenoncliccato(Escluso){
	const Checkno = Escluso.querySelector('.checkbox');
	Checkno.src = Uncheched_image;
	Escluso.style.backgroundColor = "#f4f4f4";
	Escluso.style.opacity = 0.6;	
}

function ElementiNoncliccato(Esclusi){
	for(let Escluso of Esclusi){
		stilenoncliccato(Escluso)
	}
}

function blocco(){
  for (let riq of Riquadri){
    riq.removeEventListener('click', Check);
  }
}

function completo(){
	return (riqSel['one'] !== null && riqSel['two'] !== null && riqSel['three'] !== null);
}

function risultato(){
	let ris = riqSel['one'];
	if(riqSel['one'] === riqSel['two'] || riqSel['one'] === riqSel['three']){
		ris = riqSel['one'];
	}else if(riqSel['two'] === riqSel['three']){
		ris = riqSel['two'];
	}
	return ris;
}


function resetItem(Rreset){
  const checkbox = Rreset.querySelector('.checkbox');
  checkbox.src = Uncheched_image;
  Rreset.style.backgroundColor = "#f4f4f4";
  Rreset.style.opacity = 1;
}


function restart(event){
  riqSel['one'] = null;
  riqSel['two'] = null;
  riqSel['three'] = null;
  console.log(riqSel);
  AttRiquadro();
  event.currentTarget.parentElement.remove();
  for (let Rreset of Riquadri){
    resetItem(Rreset);
  }

  const iniziopagina = document.querySelector(".question-name");
  iniziopagina.scrollIntoView();
}


function mouseover(event){
  const button = event.currentTarget;
  button.style.backgroundColor = "#e0e0e0";
}

function mouseout(event){
  const button = event.currentTarget;
  button.style.backgroundColor = "#cecece";
}


function ShowRis(risT){
  const VediRis = document.createElement("div");
  VediRis.classList.add("result-box");  
  
  const container = document.querySelector("#gioco-wrapper");
  container.appendChild(VediRis);

  const Titolorisultato = document.createElement("h2");
  Titolorisultato.textContent = RESULTS_MAP[risT].title;
  VediRis.appendChild(Titolorisultato);

  const Testoris = document.createElement("div");
  Testoris.textContent = RESULTS_MAP[risT].contents;
  Testoris.style.padding = "18px 0";  
  VediRis.appendChild(Testoris);

  const B_restart = document.createElement("div");
  B_restart.classList.add("restart-button");  
  B_restart.textContent = "Restart quiz";
  B_restart.addEventListener('mouseover', mouseover);
  B_restart.addEventListener('mouseout', mouseout);
  B_restart.addEventListener('click', restart);
  VediRis.appendChild(B_restart);
}


		
function Check(event){
	const Riquadro = event.currentTarget;
	const p = Riquadro.dataset.questionId; 
	const Scelta = Riquadro.dataset.choiceId 
	const Esclusi = document.querySelectorAll('[data-question-id =' + p + ']');	
	ElementiNoncliccato(Esclusi);
	ElementoCliccato(Riquadro);
	riqSel[p] = Scelta;
	console.log(riqSel);
	
	if(completo()){
		blocco();
		const risT = risultato();
		console.log(risT);
		ShowRis(risT);
	}
}

const Riquadri = document.querySelectorAll('.choice-grid div');
function AttRiquadro(){
	for(let riq of Riquadri){
		riq.addEventListener('click', Check);
	}
}
AttRiquadro();
