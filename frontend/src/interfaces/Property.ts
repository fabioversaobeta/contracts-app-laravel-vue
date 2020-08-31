interface ContractData {
    id: String;
    contractor_id: String;
    created_at: String;
    updated_at: String;
}

export default interface Property {
    id: string;
    email: string;
    street: string;
    number: string;
    complement: string;
    district: string;
    city: string;
    state: string;
    contract: ContractData | null;
}
