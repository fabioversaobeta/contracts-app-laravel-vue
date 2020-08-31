import styled from "vue-styled-components";

export const Container = styled.div`
    width: 360px;

    position: relative;
    padding: 16px 24px 10px 16px;
    border-radius: 10px;
    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);

    display: flex;
    align-items: center;
    justify-content: flex-start;

    & + div {
        margin-top: 8px;
    }

    > i {
        margin: 4px 12px 0 0;
    }

    div {
        color: #333333;

        flex: 1;
        p {
            margin-top: 4px;
            font-size: 14px;
            opacity: 0.8;
            line-height: 16px;
        }
    }

    button {
        /* position: absolute; */
        /* right: 16px; */
        /* top: 19px; */
        opacity: 0.6;
        border: 0;
        background: transparent;
        color: inherit;
    }
`;
