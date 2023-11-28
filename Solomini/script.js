document.addEventListener('DOMContentLoaded', function () {
    var articleContainer = document.getElementById('article-container');
    var allArticles = document.querySelectorAll('#article-container .post');

    /**
     * Detect clicks on tags to filter results on the home page and active the right tag, handle all the functions of the filter menu
     */
    $('#filter-menu a').on('click', function (e) {
        e.preventDefault();
    
        $('#filter-menu a').removeClass('active');
        $(this).addClass('active');
    
        var tag = $(this).data('tag');
        setActiveLink(e.target);
        filterArticles(tag);
    });

    /**
     * Makes the clicked tag active.
     * @param {HTMLElement} clickedLink - The clicked link element representing a tag
     */
    function setActiveLink(clickedLink) {
        var allLinks = document.querySelectorAll('#filter-menu a');
        allLinks.forEach(function (link) {
            link.classList.remove('active');
        });

        clickedLink.classList.add('active');
    }

    /**
     * Filter the menu to display items by the chosen tag, sorting from newest to oldest
     * @param {string} tags - get the data-tags of the clicked tag for check the posts with the same tag
     */
    function filterArticles(tags) {
        // Hide all articles initially
        allArticles.forEach(function (article) {
            article.style.visibility = 'hidden';
        });
    
        // If 'all' tag is selected, display all articles
        if (tags === 'all') {
            allArticles.forEach(function (article) {
                article.style.visibility = 'visible';
            });
    
            articleContainer.innerHTML = '';
    
            // Clear the article container and append cloned articles
            allArticles.forEach(function (article) {
                articleContainer.appendChild(article.cloneNode(true));
            });
        } else {
            var tagArray = tags.toLowerCase().split(' ');
    
            var visibleArticles = [];
    
            allArticles.forEach(function (article) {
                // Get the tag
                var articleTags = article.getAttribute('data-tags').toLowerCase().split(' ');
    
                // Check if any of the specified tags match the article tags
                if (tagArray.some(tag => articleTags.includes(tag))) {
                    article.style.visibility = 'visible';
                    visibleArticles.push(article.cloneNode(true));
                }
            });
    
            // Sort visible articles based on date in descending order
            visibleArticles.sort(function (a, b) {
                var dateA = new Date(a.getAttribute('data-date')).getTime();
                var dateB = new Date(b.getAttribute('data-date')).getTime();
                return dateB - dateA;
            });
    
            // Clear the article container and append sorted visible articles
            articleContainer.innerHTML = '';
            visibleArticles.forEach(function (article) {
                articleContainer.appendChild(article);
            });
        }
    }
    
    /**
     * Mobile text center
     */
    if (window.innerWidth < 576) {
        document.getElementById('filter-menu').classList.add('text-center');
    }
});