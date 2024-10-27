async function getNews() {
    let res = await fetch('https://jsonplaceholder.typicode.com/posts');
    let news = await res.json();
    let newsListContainer = document.querySelector('.article-list-container');
    news.forEach((new_one)=> {
        let one_news = document.createElement('div');
        one_news.classList.add('article');
        one_news.innerHTML = `
          <h2>${new_one.title}</h2>
            <p>Дата публикации: ${new Date().toLocaleDateString()}</p>
            <p>${new_one.body}</p>
        `;
        newsListContainer.appendChild(one_news);
    });
}
getNews();