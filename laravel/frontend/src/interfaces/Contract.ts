import Property from './Property'
import Contractor from './Contractor'

export default interface Contract {
    properties: Property[];
    contractor: Contractor;
}
