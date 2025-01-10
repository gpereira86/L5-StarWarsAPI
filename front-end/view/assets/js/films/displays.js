function displayFilmsOnPage(movies) {
    movies.sort((a, b) => new Date(a.release_date) - new Date(b.release_date));

    const filmContainer = document.getElementById('filmContainer');

    filmContainer.innerHTML = '';

    movies.forEach(movie => {
        const urlButton = window.location.href+'movie/?name=' + createSlug(movie.name) + '&id=' + movie.id;
        const releaseDateFormatted = formatDateUS(movie.release_date);

        const filmCard = `
            <div class="col">
                <div class="card h-100">
                    <img src="${movie.moviePoster}" class="card-img-top img-card-max-size" alt="${movie.name}">
                    <div class="card-body">
                        <h6 class="card-title text-light fw-bolder text-center">${movie.name}</h6>
                        <p class="card-text text-center">
                            <span>Release date: </span>
                            ${releaseDateFormatted}
                        </p>
                    </div>
                    <div class="card-footer default-color text-center">
                        <button 
                            type="button" 
                            class="custom-outline-warning" 
                            data-id="${movie.id}" 
                            onclick="window.location.href = '${urlButton}'">
                            The Force Unveils More
                        </button>
                    </div>
                </div>
            </div>
        `;
        filmContainer.innerHTML += filmCard;
    });
}

function displayFilmDetailsInModal(movie) {

    document.getElementById('contentModalLabel').textContent = movie.name;

    const modalImage = document.querySelector('#filmDetailModal .modal-body img');
    modalImage.src = movie.moviePoster;
    modalImage.alt = movie.name;

    document.getElementById('episodeNumber-modal').textContent = movie.episode || 'N/A';

    const synopsisModal = document.getElementById('synopsis-modal');
    if (synopsisModal) {
        const formattedSynopsis = movie.synopsis
            .replace(/\r\n\r\n/g, '<br>')
            .replace(/\r\n/g, ' ');
        synopsisModal.innerHTML = formattedSynopsis;
    }

    document.getElementById('releaseDate-modal').textContent = formatDateUS(movie.release_date);
    document.getElementById('filmAge-modal').textContent = movie.film_age || 'N/A';
    document.getElementById('director-modal').textContent = movie.director || 'N/A';
    document.getElementById('producers-modal').textContent = movie.producers || 'N/A';
    document.getElementById('characters-modal').textContent = movie.characters && movie.characters.length > 0 ? movie.characters.join(', ') : 'N/A';
}

function displayFilmDetailsNewRoute(movie) {

    document.getElementById('contentNewRouteLabel').textContent = movie.name;

    const imgData = document.querySelector('#contentNewRoute img');
    imgData.src = movie.moviePoster;
    imgData.alt = movie.name;

    document.getElementById('episodeNumber').textContent = movie.episode || 'N/A';

    const synopsisModal = document.getElementById('synopsis');
    if (synopsisModal) {
        const formattedSynopsis = movie.synopsis
            .replace(/\r\n\r\n/g, '<br>')
            .replace(/\r\n/g, ' ');
        synopsisModal.innerHTML = formattedSynopsis;
    }

    document.getElementById('releaseDate').textContent = formatDateUS(movie.release_date);
    document.getElementById('filmAge').textContent = movie.film_age || 'N/A';
    document.getElementById('director').textContent = movie.director || 'N/A';
    document.getElementById('producers').textContent = movie.producers || 'N/A';
    document.getElementById('characters').textContent = movie.characters && movie.characters.length > 0 ? movie.characters.join(', ') : 'N/A';

}


window.displayFilmsOnPage = displayFilmsOnPage;
window.displayFilmDetailsInModal = displayFilmDetailsInModal;