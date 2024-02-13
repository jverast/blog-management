const $body = document.body,
  $themeToggle = document.getElementById('theme-toggle');

if (localStorage.getItem('theme')) {
  $body.dataset.bsTheme = localStorage.getItem('theme');
  $themeToggle.children[0].checked =
    $body.dataset.bsTheme === 'dark' ? true : false;
} else {
  $body.dataset.bsTheme = 'light';
}

document.addEventListener('click', (e) => {
  if (e.target.matches('#theme-toggle > label')) {
    let currentTheme = $body.dataset.bsTheme;
    currentTheme =
      currentTheme === 'light'
        ? (currentTheme = 'dark')
        : (currentTheme = 'light');

    localStorage.setItem('theme', currentTheme);
    $body.dataset.bsTheme = currentTheme;
  }
});
