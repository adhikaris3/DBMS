//Function expression to select items

const selectElement = (s) => document.querySelector(s);

//Opens the menu when clicked
selectElement('.open').addEventListener('click', () => {
    selectElement('.nav-list').classList.add('active');
});

//close the menu on click
selectElement('.close').addEventListener('click', () => {
    selectElement('.nav-list').classList.remove('active');
});
