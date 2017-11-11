const error = (responseError) => {
    let messageError = 'Não foi possível realizar a operação. Tente novamente';
    switch (responseError.response.status) {
        case 422:
            messageError = 'Informações inválidas! Verifique os dados novamente.';
            break;
    }
    new PNotify({
        title: 'Mensagem de erro',
        text: messageError,
        styling: 'brighttheme',
        type: 'error'
    });
};

const afterSave = () => {
    new PNotify({
        title: 'Informação',
        text: 'Dados salvos com sucesso!',
        styling: 'brighttheme',
        type: 'success'
    });
};

export {
    error,
    afterSave
}