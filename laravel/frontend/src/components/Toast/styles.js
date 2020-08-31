import styled from 'vue-styled-components'

export const Container = styled.div`
    position: absolute;
    z-index: 9;
    right: 0;
    top: 0px;
    margin: 10px 10px 0 0;
    padding: 14px;
    overflow: hidden;

    .info {
      background: #ebf8ff;
      color: #3172b7;
    }

    .success {
      background: #e6fffa;
      color: #2a656a;
    }

    .error {
      background: #fddede;
      color: #c53030;
    }
`
