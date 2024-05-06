<?php
include_once("../../../layouts/head.php");
include "../dashboard/header.dash.php";
include "../../config/connection.php";
?>

<div class="h-full w-full absolute">
    <div class="container mx-auto px-6 mt-20 h-[calc(100vh-80px)]">
        <section class="container px-4 mx-auto ">
            <?php
            if (isset($_SESSION['message'])) : ?>
                <script>
                    Swal.fire({
                        title: "¡Empresa registrado con éxito!",
                        icon: "success",
                        backdrop: 'rgba(75, 85, 99, 0.5)'
                    });
                </script>
                <?php unset($_SESSION['message']) ?>
            <?php endif;
            ?>
            <div class="items-center justify-between flex">
                <div class="flex items-center gap-x-4">
                    <i class="fas fa-thin fa-users-viewfinder text-gray-400 text-[50px]"></i>
                    <div>
                        <h3 class="text-3xl font-medium text-gray-400">Empresas</h3>
                        <div class="flex items-center gap-x-3.5 text-sm text-gray-800 ">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                <path d="M12 12v9" />
                                <path d="m8 17 4 4 4-4" />
                            </svg>
                            Downloads
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-x-3 ">
                    <button onclick="openModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-[12px] md:py-2 px-4 rounded inline-flex items-center display gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" width="18" height="18">
                            <path d="M480,224H288V32c0-17.673-14.327-32-32-32s-32,14.327-32,32v192H32c-17.673,0-32,14.327-32,32s14.327,32,32,32h192v192   c0,17.673,14.327,32,32,32s32-14.327,32-32V288h192c17.673,0,32-14.327,32-32S497.673,224,480,224z" />
                        </svg>
                        <span class="hidden md:block">Nuevo</span>
                    </button>
                </div>
            </div>

            <div class="mt-6 md:flex md:items-center md:justify-between">
                <button class="px-2 py-2 border text-xs font-medium text-gray-600  bg-gray-100 sm:text-sm flex items-center gap-2 rounded">
                    <ion-icon name="funnel-outline" class="text-xl "></ion-icon>
                    Filtrar
                    <ion-icon name="chevron-down-outline" class="text-xl"></ion-icon>
                </button>

                <div class="relative flex items-center mt-4 md:mt-0">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>

                    <input type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 border border-gray-200 rounded md:w-80 placeholder-gray-700 pl-11 rtl:pr-11 rtl:pl-5 focus:ring-gray-300 focus:outline-none focus:ring focus:ring-opacity-40 bg-gray-100">
                </div>
            </div>

            <div class="flex flex-col mt-2">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            N
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Empresa
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Descripción
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Ruc
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Web
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Dirección
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Telefono
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Razón Social
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Fundación
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Usuario
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Correo
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Opciónes
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    <?php
                                    $connect = Connection::connect();
                                    $sql = "SELECT u.*, r.name_rol AS company_rol FROM companies u INNER JOIN roles r ON u.id_rol_company = r.id_rol";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->execute();
                                    $counter = 1;
                                    while ($companies = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-400">
                                                <?php echo "$counter" ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['name_company'] ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['decription_company'] ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['document_company'] ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['website_company'] ?>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['addres_company'] ?>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['phone_company'] ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['type_company'] ?>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['foundation_company'] ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['username_company'] ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                <?= $companies['email_company'] ?>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <button onclick="adw(<?php echo $companies['id_company']; ?>)" class="px-[5px] py-[5px] text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100 border">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32">
                                                        <path d="M22.64 5.333c-0.287 0-0.575 0.109-0.794 0.329l-1.917 1.917 4.491 4.491 1.917-1.917c0.439-0.439 0.439-1.15 0-1.588l-2.903-2.904c-0.22-0.22-0.507-0.329-0.794-0.329zM18.245 9.263l-12.912 12.912v4.491h4.491l12.912-12.912-4.491-4.491z"></path>
                                                    </svg>
                                                </button>
                                                <button onclick="confirmDelete(<?php echo $companies['id_company']; ?>)" class="px-[5px] py-[5px] text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100 border">
                                                    <svg width="25" height="25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $counter++ ?>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 sm:flex sm:items-center sm:justify-between pb-6 ">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Pagina <span class="font-medium text-gray-700 dark:text-gray-100">1 de 10</span>
                </div>

                <div class="flex items-center mt-4 gap-x-4 sm:mt-0 ">
                    <a href="#" class="flex items-center justify-center w-1/2 px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
                        <span class="text-[16px]">Anterior</span>
                    </a>

                    <a href="#" class="flex items-center justify-center w-1/2 px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <span class="text-[16px]">Siguiente</span>
                        <ion-icon name="arrow-forward-outline" class="text-lg"></ion-icon>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster bg-gray-600 bg-opacity-50 ">
        <div class=" shadow-lg modal-container bg-white w-full sm:max-w-[800px]  h-[100vh] xl:h-auto mx-auto rounded shadow-lg z-50 overflow-y-auto ">
            <div class="modal-content text-left p-5 w-full">

                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-2xl font-medium text-gray-900">
                        Nueva Empresa
                    </h2>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <form class="" method="POST" action="../../services/company-service/create-cp-service.php">
                    <label for="phone" class="mb-1 block text-base font-medium">Nombre de la empresa</label>
                    <input type='text' placeholder='Nombres' name="name-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500 mb-2" />
                    <label for="phone" class="mb-1 block text-base font-medium">Descripción</label>
                    <textarea placeholder='Message' rows="3" name="description-cp" class="w-full block rounded py-2.5 px-4 border text-sm outline-blue-500 mr-0 mb-2"></textarea>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 mb-2">
                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Telefono</label>
                            <input type='text' placeholder='Nombres' name="phone-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>

                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Dirección</label>
                            <input type='text' placeholder='Nombres' name="address-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>
                    </div>
                    <label for="phone" class="mb-1 block text-base font-medium">Pagina Web</label>
                    <input type='text' placeholder='Nombres' name="web-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500 mb-2" />
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 mb-2">
                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Ruc</label>
                            <input type='text' placeholder='Nombres' name="document-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>

                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Fundación</label>
                            <input type='date' placeholder='Nombres' name="fundation-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>
                    </div>
                    <label for="phone" class="mb-1 block text-base font-medium">Razón Social</label>
                    <input type='text' placeholder='Nombres' name="type-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500 mb-2" />
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Datos adicionales</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 mb-2">
                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Usuario</label>
                            <input type='text' placeholder='Nombres' name="username-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>

                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Correo</label>
                            <input type='email' placeholder='Correo' name="email-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>
                    </div>
                    <label for="phone" class="mb-1 block text-base font-medium">Contraseña</label>
                    <input type='password' placeholder='contraseña' name="password-cp" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500 mb-6" />
                    <input type="hidden" name="role-cp" value="2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <button type='button' onclick="modalClose()" class="border bg-white   hover:bg-gray-100 font-semibold rounded text-sm px-4 py-2.5 w-full">Cancelar</button>
                        <button type='submit' name="register-cp" class="text-white bg-blue-600 hover:bg-blue-500 font-semibold rounded text-sm px-4 py-2.5 w-full">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.querySelector('.main-modal');
    const closeButton = document.querySelectorAll('.modal-close');

    const modalClose = () => {
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        });
    }

    const openModal = () => {
        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');
        modal.style.display = 'flex';
    }
    for (let i = 0; i < closeButton.length; i++) {
        const elements = closeButton[i];
        elements.onclick = (e) => modalClose();
        modal.style.display = 'none';
        window.onclick = function(event) {
            if (event.target == modal) modalClose();
        }
    }

    function confirmDelete(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo",
            backdrop: 'rgba(75, 85, 99, 0.5)'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteCompany(id);
            }
        });
    }

    function deleteCompany(id) {
        location.href = "../../services/company-service/delete-cp-service.php?id=" + id;
    }
</script>