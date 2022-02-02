/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

var responses = document.getElementsByClassName('test');

var res = parseInt(document.getElementById('res').textContent,10);

for (let response of responses) {
    const test = parseInt(response.textContent, 10)
    if (test === res) {
        response.addEventListener('click', function () {
            response.className = "col text-center bg-success m-2";
            setTimeout(function(){location.reload();},600)
        })
    } else {
        response.addEventListener('click', function () {
            response.className = "col text-center bg-danger m-2";
            setTimeout(function(){location.reload();},600)
        })
    }
}

