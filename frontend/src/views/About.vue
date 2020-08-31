<template>
    <div class="about">
        <h1>This is an about Functionality</h1>
        <div class="items">
            <ul>
                <li>
                    <input type="checkbox" checked disabled>
                    Permitir o cadastro de um imóvel com algumas características.
                </li>
                <li>
                    <input type="checkbox" checked disabled>
                    Para que o cadastro ocorra deverá haver validações em dois níveis. Frontend e backend:
                </li>
                <li>
                    <input type="checkbox" checked disabled>
                    Permitir visualização dos imóveis cadastrados.
                </li>
                <li>
                    <input type="checkbox" checked disabled>
                    permitir a remoção de uma propriedade
                </li>
                <li>
                    <input type="checkbox" checked disabled>
                    a remoção de uma propriedade deverá ser virtual.
                </li>
                <li>
                    <input type="checkbox" disabled>
                    Criação de um contrato que permita associação com uma propriedade
                </li>
                <li>
                    <input type="checkbox" disabled>
                    Criação de um contrato que permita associação com uma propriedade
                </li>
            </ul>
            <hr />
            <ul>
                <li>
                    <input type="checkbox" disabled>
                    Job: deve-se utilizar alguma forma de job;
                </li>
                <li>
                    <input type="checkbox" checked disabled>
                    Teste unitário de backend;
                </li>
                <li>
                    <input type="checkbox" disabled>
                    Teste de integração backend;
                </li>
                <li>
                    <input type="checkbox" checked disabled>
                    SPA.
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss">
.about {
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;

    .items {
        width: 800px;
        text-align: left;
        margin: 0 auto;
        padding: 30px;

        display: flex;
    }

    ul {
        list-style-type: none;
        padding: 20px;
    }
}
</style>
