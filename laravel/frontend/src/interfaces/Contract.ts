import Property from './Property'
import Contractor from './Contractor'

export default interface Contract {
    id: string;
    properties: Property[];
    contractor: Contractor;
}
