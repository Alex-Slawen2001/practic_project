async function getCommnets () {
    let res = await fetch('https://jsonplaceholder.typicode.com/comments');
    let comments = await res.json();
    let commentsListContainer = document.querySelector(".article-list-container");
    comments.forEach((post) => {
        let comment = document.createElement("div");
        comment.classList.add('comment');
        comment.innerHTML = `
            <h2>${post.title}</h2>
            <p>Дата публикации: ${new Date().toLocaleDateString()}</p>
            <p>${post.body}</p>
        `;
        commentsListContainer.appendChild(comment)
    });
}
getCommnets();