export default interface Property {
    id: string;
    email: string;
    street: string;
    number: string;
    complement: string;
    district: string;
    city: string;
    state: string;
    contract: Record<string, any>;
}
