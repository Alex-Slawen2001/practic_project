async function getPosts() {
    let res = await fetch('https://jsonplaceholder.typicode.com/posts');
    let posts = await res.json();
    let articleListContainer = document.querySelector(".article-list-container");
    posts.forEach((post) => {
        let article = document.createElement('div');
        article.classList.add('article');
        article.innerHTML = `
            <h2>${post.title}</h2>
            <p>Дата публикации: ${new Date().toLocaleDateString()}</p>
            <p>${post.body}</p>
        `;
        articleListContainer.appendChild(article);
    });
}
getPosts();
