document.addEventListener("DOMContentLoaded", function () {
    const apiKey = `f50642a0`;
    const apiUrl = `http://www.omdbapi.com/?apikey=${apiKey}&s=`;

    const searchMovie = document.getElementById('search-movie');
    const filmsContainer = document.getElementById("films__container");
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const paginationButtons = document.getElementById('pagination-buttons');

    let currentPage = 1;


    async function searchMovies(query, page) {
        try {
            const response = await fetch(apiUrl + query + `&page=${page}`);
            const data = await response.json();

            filmsContainer.innerHTML = '';
            if (data.Search) {
                data.Search.forEach(film => {
                    const filmElement = document.createElement('div');
                    filmElement.classList.add('film__item');
                    filmElement.dataset.id = film.imdbID;
                    filmElement.addEventListener('click', () => redirectToMovieDetails(film.imdbID));
                    if (film.Poster != "N/A") {
                        filmElement.innerHTML = `
                            <img src="${film.Poster}" alt="film-poster" class="film__item-poster">
                            <p class="film__item-title">${film.Title}</p>
                            <div class="film__item-info">
                            <span class="film__item-year">${film.Year}</span>
                            <span class="film__item-type">${film.Type}</span>
                            </div>
                            `
                        filmsContainer.appendChild(filmElement);
                    }
                });
                updatePaginationUI(page, Math.ceil(data.totalResults / 10));
            }
            else {
                moviesContainer.innerHTML = '<p>No results found</p>';
                updatePaginationUI(1, 1);
            }
        }
        catch (error) {
            console.error('Error fetching data:', error);
        }
    }
    function updatePaginationUI(currentPage, total) {
        document.getElementById("current-page").textContent = currentPage;
        paginationButtons.style.display = total > 1 ? 'inline-flex' : 'none';
    }
    function changePage(offset) {
        currentPage += offset;
        if (currentPage < 1) {
            currentPage = 1;
        }
        searchMovies('all', currentPage);
    }

    prev.addEventListener('click', function () {
        changePage(-1);
    })
    next.addEventListener('click', function () {
        changePage(1);
        console.log(currentPage);
    })
    searchMovies('all', currentPage);


    window.findMovies = function () {
        let searchTerm = (searchMovie.value).trim();
        searchTerm.length > 0 ? searchMovies(searchTerm) : searchMovies('all');
    }
    window.redirectToMovieDetails = function (id) {
        window.location.href = `blocks/MovieDetails.php?id=${id}`;
    }
})
