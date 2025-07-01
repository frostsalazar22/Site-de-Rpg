function filtrar() {
  const filtroTipo = document.getElementById('category-select').value.toLowerCase();
  const buscaTexto = document.getElementById('search-input').value.toLowerCase();

  const cards = document.querySelectorAll('.card');

  cards.forEach(card => {
    const tipo = card.getAttribute('data-type');
    const nome = card.getAttribute('data-name').toLowerCase();

    const correspondeTipo = (filtroTipo === 'todos' || tipo === filtroTipo);
    const correspondeBusca = nome.includes(buscaTexto);

    if (correspondeTipo && correspondeBusca) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
}
