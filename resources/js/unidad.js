// resources/js/unidad.js

export default () => ({
    // Variables for DOMICILIOS
    id_inmueble: '',
    piso: '',
    unidadAdministrativa: '',
    domicilios: [],
    // Variables for HORARIOS
    horarioAtencion: '',
    area: '',
    horarios: [],

    agregarDomicilio() {
        if (this.id_inmueble && this.piso && this.unidadAdministrativa) {
            let domicilio = `${this.getInmueble(this.id_inmueble)} / Piso: ${this.piso} / Unidad: ${this.unidadAdministrativa}`;
            this.domicilios.push(domicilio);
            this.id_inmueble = '';
            this.piso = '';
            this.unidadAdministrativa = '';
        } else {
            alert('Completa todos los campos para agregar el domicilio.');
        }
    },
    eliminarDomicilio(index) {
        this.domicilios.splice(index, 1);
    },
    agregarHorario() {
        if (this.horarioAtencion && this.area) {
            let horario = `Horario: ${this.horarioAtencion} / Área: ${this.area}`;
            this.horarios.push(horario);
            this.horarioAtencion = '';
            this.area = '';
        } else {
            alert('Completa todos los campos para agregar el horario.');
        }
    },
    eliminarHorario(index) {
        this.horarios.splice(index, 1);
    },
    getInmueble(id) {
        const inmuebles = {
            '1': 'Inmueble Niños Héroes No. 119',
            '2': 'Inmueble Niños Héroes No. 132',
            '3': 'Inmueble Niños Héroes No. 150',
            '4': 'Inmueble Torre Norte',
            '5': 'Inmueble Torre Sur',
            '6': 'Inmueble Claudio Bernard',
            '7': 'Inmueble Instituto de Ciencias Forenses',
            '8': 'Inmueble Centro de Justicia alternativa',
            '9': 'Inmueble Patriotismo',
            '10': 'Inmueble Dr. Liceaga',
            '11': 'Inmueble Dr. Lavista',
            '12': 'Inmueble Clementina Gil de Léster',
            '13': 'Inmueble Centro de Desarrollo Infantil Gloria Ledúc de Agüero',
            '14': 'Inmueble Centro de Desarrollo Infantil José María Pino Suarez',
            '15': 'Inmueble Centro de Desarrollo Infantil Niños Héroes',
            '16': 'Inmueble Archivo Delicias',
            '17': 'Inmueble Archivo – Fernando de Alva Ixtlilxóchitl',
            '18': 'Inmueble Archivo Dr. Navarro',
            '20': 'Inmueble Reclusorio Preventivo Norte',
            '21': 'Inmueble Reclusorio Preventivo Sur',
            '23': 'Inmueble Reclusorio Preventivo Oriente',
            '24': 'Inmueble Reclusorio Preventivo Santa Martha Acatitla',
            '25': 'Inmueble Plaza Juarez',
            '26': 'Inmueble Lerma',
        };
        return inmuebles[id] || 'Desconocido';
    }
});
