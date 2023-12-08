import mask from '@alpinejs/mask';
import Alpine from 'alpinejs';

import deleteButtonClick from "./delete";

window.Alpine = Alpine

Alpine.plugin(mask)
Alpine.start()

// users();

deleteButtonClick();
