// confirmDelete.js
function confirmDelete(id) {
    if (confirm("Tem certeza que deseja excluir este item?")) {
        var form = document.getElementById(id);
        if (form) {
            form.submit();
        } else {
            console.error('Formulário não encontrado com ID:', id);
        }
    }
}
