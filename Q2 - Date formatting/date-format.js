(() => 
{
	const dataFormatoISO = document.getElementsByClassName('js-date-format');
	let datasIniciais = [];
	const iniciaData = new Date();

	const MILISSEGUNDOS_POR_SEGUNDO = 1000;
	const SEGUNDOS_POR_MINUTO = 60;
	const SEGUNDOS_POR_HORA = 3600;

	for (const dataISO of dataFormatoISO) {
		datasIniciais.push(dataISO.innerText);
	}

	setInterval(() => {
		const dataAtual = new Date();

		for (let i = 0; i < dataFormatoISO.length; i++) {
			const date = datasIniciais[i];
			const dataFinal = new Date(date);
			let diferencaEmSegundos = getDiferencaEmSegundos(dataFinal, dataAtual);
			dataFormatoISO[i].innerHTML = converteFormatoParaJs(i, diferencaEmSegundos);
		}
	}, 1000);

	function getDiferencaEmSegundos(dataFinal, dataAtual) {
		const diferencaTempoEmSegundos = Math.abs(dataFinal - dataAtual);
		let diferencaEmSegundos = diferencaTempoEmSegundos / MILISSEGUNDOS_POR_SEGUNDO;
		diferencaEmSegundos = Math.floor(diferencaEmSegundos);

		return diferencaEmSegundos;
	}

	function getSegundosEmMinutos(diferencaTempoEmSegundos) {
		return Math.floor(diferencaTempoEmSegundos / SEGUNDOS_POR_MINUTO);
	}

	function getSegundosEmHoras(diferencaEmSegundos) {
		return Math.floor(diferencaEmSegundos / SEGUNDOS_POR_HORA);
	}

	function converteFormatoParaJs(formatoISO, diferencaEmSegundos) {
		
		let saida = dataFormatoISO[formatoISO].innerText;

		if (diferencaEmSegundos < 2) {
			saida = diferencaEmSegundos + ' second ago';
		} else if (diferencaEmSegundos < 60) {
			saida = diferencaEmSegundos + ' seconds ago';
		} else if (diferencaEmSegundos < 120) {
			saida = getSegundosEmMinutos(diferencaEmSegundos) + ' minute ago';
		} else if (diferencaEmSegundos < 3600) {
			saida = getSegundosEmMinutos(diferencaEmSegundos) + ' minutes ago';
		} else if (diferencaEmSegundos < 7200) {
			saida = getSegundosEmHoras(diferencaEmSegundos) + ' hour ago';
		} else if (diferencaEmSegundos < 86400) {
			saida = getSegundosEmHoras(diferencaEmSegundos) + ' hours ago';
		} else {
			saida = iniciaData.toISOString();
		}

		return saida;
	}
}
)()