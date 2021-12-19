// CE FICHIER EST UN TEST
// function sendFeedback() {
// 	const article = document.querySelector('input[class=rating__article]:checked');
// 	const feedback = { 
// 		article: checkValues(article), 
// 	};
	
// 	displayFeedback(JSON.stringify(feedback));
// }

// function checkValues(el) {
// 	if (!el) {
// 		return null;
// 	} else {
// 		return el.value; 
// 	}
// }

// function displayFeedback(msg) {
// 	const feedbackEl = document.createElement('pre');
// 	feedbackEl.insertAdjacentHTML('afterbegin', msg);
// 	document.querySelector('.feedback').append(feedbackEl);
// }

// document.querySelector('.feedback__submit').addEventListener('click', (e) => {
// 	e.preventDefault();
// 	sendFeedback();
// });