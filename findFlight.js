document.addEventListener('DOMContentLoaded', function(){
    document.querySelector('#find_flight').onkeyup = findFlight;
})
function findFlight(){
    var origin = document.querySelector('#find_flight').value;
    fetch(`flightFindKeyup.php?origin=${ origin }`).then(response=>response.text()).then(response=>document.querySelector('#print_flight').innerHTML = response);
}