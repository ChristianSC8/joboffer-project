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
                        <h3 class="text-3xl font-medium text-gray-400">Ofertas laborales</h3>
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
                                            Titulo
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Descripción
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Fecha inicio
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Fecha limite
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Ubicación
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Salario
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Tipo
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Estado
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Limite postulates
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Categoria
                                        </th>
                                        <th class="px-4 py-3.5 text-md font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                            Opciónes
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    <?php if (isset($_SESSION["id_company"])) : ?>
                                        <?php
                                        $idCompany = $_SESSION["id_company"];
                                        $connect = Connection::connect();
                                        $sql = "SELECT u.*, r.name_category AS name_category 
                                        FROM joboffers u 
                                        INNER JOIN categories r ON u.id_category_joboffer = r.id_category
                                        WHERE u.id_companies_joboffer = $idCompany";
                                        $stmt = $connect->prepare($sql);
                                        $stmt->execute();
                                        $counter = 1;
                                        while ($joboffers = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                        ?>
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-400">
                                                    <?php echo "$counter" ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['title_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['description_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['publicationdate_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['enddate_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['addres_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['salary_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['contractype_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['state_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['limit_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['name_category'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <button onclick="wd(<?php echo $users['id_user']; ?>)" class="px-[5px] py-[5px] text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100 border">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32">
                                                            <path d="M22.64 5.333c-0.287 0-0.575 0.109-0.794 0.329l-1.917 1.917 4.491 4.491 1.917-1.917c0.439-0.439 0.439-1.15 0-1.588l-2.903-2.904c-0.22-0.22-0.507-0.329-0.794-0.329zM18.245 9.263l-12.912 12.912v4.491h4.491l12.912-12.912-4.491-4.491z"></path>
                                                        </svg>
                                                    </button>
                                                    <button onclick="confirmDelete(<?php echo $users['id_user']; ?>)" class="px-[5px] py-[5px] text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100 border">
                                                        <svg width="25" height="25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $counter++ ?>
                                        <?php
                                        } ?>
                                    <?php else : ?>

                                        <?php
                                        $connect = Connection::connect();
                                        $sql = "SELECT u.*, r.name_category AS name_category FROM joboffers u INNER JOIN categories r ON u.id_category_joboffer = r.id_category";
                                        $stmt = $connect->prepare($sql);
                                        $stmt->execute();
                                        $counter = 1;
                                        while ($joboffers = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                        ?>
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-400">
                                                    <?php echo "$counter" ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['title_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['description_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['publicationdate_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['enddate_joboffer'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['addres_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['salary_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['contractype_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['state_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['limit_joboffer'] ?>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500 text-[15px]">
                                                    <?= $joboffers['name_category'] ?>
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <button onclick="wd(<?php echo $users['id_user']; ?>)" class="px-[5px] py-[5px] text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100 border">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32">
                                                            <path d="M22.64 5.333c-0.287 0-0.575 0.109-0.794 0.329l-1.917 1.917 4.491 4.491 1.917-1.917c0.439-0.439 0.439-1.15 0-1.588l-2.903-2.904c-0.22-0.22-0.507-0.329-0.794-0.329zM18.245 9.263l-12.912 12.912v4.491h4.491l12.912-12.912-4.491-4.491z"></path>
                                                        </svg>
                                                    </button>
                                                    <button onclick="confirmDelete(<?php echo $users['id_user']; ?>)" class="px-[5px] py-[5px] text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100 border">
                                                        <svg width="25" height="25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $counter++ ?>
                                        <?php
                                        } ?>
                                    <?php endif; ?>
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
    <div class="main-modal fixed w-full inset-0 z-50 overflow-hidden animated fadeIn faster bg-gray-600 bg-opacity-50 ">
        <div class=" shadow-lg modal-container bg-white w-full sm:max-w-[800px] shadow-lg z-50 overflow-y-auto ">
            <div class="modal-content text-left p-5 w-full ">

                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-2xl font-medium text-gray-900">
                        Nueva Oferta laboral
                    </h2>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <form class="" method="POST" action="../../services/joboffer-service/create-joboffer-service.php">
                    <label for="phone" class="mb-1 block text-base font-medium">Titulo</label>
                    <input type='text' placeholder='Nombres' name="title" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500 mb-3" />
                    <label for="phone" class="mb-1 block text-base font-medium">Descripción</label>
                    <textarea placeholder='Message' rows="5" name="description" class="w-full block rounded py-2.5 px-4 border text-sm outline-blue-500 mr-0 mb-3"></textarea>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 mb-2">
                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Fecha inicio</label>
                            <input type='text' placeholder='Nombres' name="datestart" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>

                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Fecha fin</label>
                            <input type='text' placeholder='Nombres' name="dateend" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Ubicación</label>
                            <input type='text' placeholder='Nombres' name="address" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>

                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Salario</label>
                            <input type='date' placeholder='Nombres' name="salary" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Tipo</label>
                            <div class="relative mb-4">
                                <button type="button" id="btn-type-dropdown" class="py-2.5 px-4 flex justify-between items-center w-full rounded h-[42px] border text-sm outline-blue-500">
                                    <input type="hidden" value="" name="type-job" id="input-type">
                                    <span id="text-type">Selecione el tipo</span>
                                    <ion-icon id="icon-type" name="chevron-down-outline" class="text-xl"></ion-icon>
                                </button>
                                <div id="dropdown-type" class="origin-top-right absolute right-0 mt-2 w-52 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown">
                                    <ul class="py-2 p-2" role="menu">
                                        <li class="items-type flex block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer flex gap-2 items-center" role="menuitem" data-id="Presencial">
                                            <ion-icon name="person-outline" class="text-md"></ion-icon> Presencial
                                        </li>
                                        <li class="items-type flex block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer flex gap-2 items-center" role="menuitem" data-id="Remoto">
                                            <ion-icon name="people-outline" class="text-md"></ion-icon> Remoto
                                        </li>
                                        <li class="items-type flex block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer flex gap-2 items-center" role="menuitem" data-id="Hibrido">
                                            <ion-icon name="people-outline" class="text-md"></ion-icon> Hibrido
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Estado</label>
                            <div class="relative mb-4">
                                <button type="button" id="btns-state-dropdown" class="py-2.5 px-4 flex justify-between items-center w-full rounded h-[42px] border text-sm outline-blue-500">
                                    <input type="hidden" value="" name="state-job" id="input-state">
                                    <span id="text-state">Selecione el estado</span>
                                    <ion-icon id="icon-state" name="chevron-down-outline" class="text-xl"></ion-icon>
                                </button>
                                <div id="dropdown-state" class="origin-top-right absolute right-0 mt-2 w-52 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown z-50">
                                    <ul class="py-2 p-2" role="menu">
                                        <li class="items-states activo flex block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer flex gap-2 items-center" role="menuitem" data-id="activo">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="activo" viewBox="0 0 512 512" width="20px">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M464 128L240 384l-96-96M144 384l-96-96M368 128L232 284" />
                                            </svg>
                                            Activo
                                        </li>
                                        <li class="items-states  inactivo flex block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer flex gap-2 items-center" role="menuitem" data-id="inactivo">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inactivo" viewBox="0 0 512 512" width="20px">
                                                <path d="M256 80c-8.66 0-16.58 7.36-16 16l8 216a8 8 0 008 8h0a8 8 0 008-8l8-216c.58-8.64-7.34-16-16-16z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                <circle cx="256" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            Inactivo
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <label for="phone" class="mb-1 block text-base font-medium">Limite postulantes</label>
                            <input type='text' placeholder='Nombres' name="limit-job" class="w-full rounded py-2.5 px-4 border text-sm outline-blue-500" />
                        </div>
                        <div class="categories">
                            <label for="phone" class="mb-1 block text-base font-medium">Categoria</label>
                            <div class="relative mb-4">
                                <button type="button" id="drop-btn-categories" class="py-2.5 px-4 flex justify-between items-center w-full rounded h-[42px] border text-sm outline-blue-500">
                                    <input type="hidden" value="" name="category" id="input-category">
                                    <span id="text-category">Selecione la categoria</span>
                                    <ion-icon id="icon-category" name="chevron-down-outline" class="text-xl"></ion-icon>
                                </button>
                                <div id="dropdown-categories" class="origin-top-right absolute right-0 mt-2 w-52 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown">
                                    <ul class="py-2 p-2" role="menu">
                                        <?php
                                        $sql = "SELECT * FROM categories";
                                        $connect = Connection::connect();
                                        $stmt = $connect->prepare($sql);
                                        $stmt->execute();
                                        while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <li class="items-categories flex block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer flex gap-2 items-center" role="menuitem" data-id="<?php echo $categories['id_category'] ?>">
                                                <?php echo $categories['name_category'] ?>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="role-cp" value="2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                        <button type='button' onclick="modalClose()" class="border bg-white   hover:bg-gray-100 font-semibold rounded text-sm px-4 py-2.5 w-full">Cancelar</button>
                        <button type='submit' name="joboffer" class="text-white bg-blue-600 hover:bg-blue-500 font-semibold rounded text-sm px-4 py-2.5 w-full">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<style>
    .dropdown {
        display: none;
    }

    .dropdown.active {
        display: block;
    }
</style>

<script>
    //--------- dropdow categories-----------//

    const dropBtnCategories = document.getElementById('drop-btn-categories');
    const dropdownCategories = document.getElementById('dropdown-categories');
    const iconCategory = document.getElementById('icon-category');

    dropBtnCategories.addEventListener('click', () => {
        iconCategory.classList.toggle('rotate-[-180deg]');
        dropdownCategories.classList.toggle('active');
    });

    const itemsCategories = document.querySelectorAll('.items-categories');
    const inputCategory = document.getElementById('input-category');
    const textCategory = document.getElementById('text-category');
    itemsCategories.forEach(btnCategory => {
        btnCategory.addEventListener('click', (evt) => {
            dropdownCategories.classList.remove('active');
            iconCategory.classList.remove('rotate-[-180deg]');
            const itemId = btnCategory.getAttribute('data-id');
            const textValue = evt.target.innerText.trim();
            inputCategory.value = itemId;
            textCategory.textContent = textValue;

        });
    });

    //--------- dropdow state -----------//

    const btnStateDropdown = document.getElementById('btns-state-dropdown');
    const dropdownState = document.getElementById('dropdown-state');
    const iconState = document.getElementById('icon-state');

    btnStateDropdown.addEventListener('click', () => {
        iconState.classList.toggle('rotate-[-180deg]');
        dropdownState.classList.toggle('active');
    });

    const itemsStates = document.querySelectorAll('.items-states');
    const inputState = document.getElementById('input-state');
    const textState = document.getElementById('text-state');
    itemsStates.forEach(btnState => {
        btnState.addEventListener('click', (evt) => {
            dropdownState.classList.remove('active');
            iconState.classList.remove('rotate-[-180deg]');
            const itemId = btnState.getAttribute('data-id');
            const inputText = evt.target.innerText.trim();
            inputState.value = itemId;
            textState.textContent = inputText;
            console.log(inputState.value);
        });
    });

    //--------- dropdow Type -----------//

    const btnTypeDropdown = document.getElementById('btn-type-dropdown');
    const dropdownType = document.getElementById('dropdown-type');
    const iconType = document.getElementById('icon-type');

    btnTypeDropdown.addEventListener('click', () => {
        iconType.classList.toggle('rotate-[-180deg]');
        dropdownType.classList.toggle('active');
    });

    const itemstype = document.querySelectorAll('.items-type');
    const inputType = document.getElementById('input-type');
    const textType = document.getElementById('text-type');
    itemstype.forEach(btnType => {
        btnType.addEventListener('click', (evt) => {
            dropdownType.classList.remove('active');
            iconType.classList.remove('rotate-[-180deg]');
            const itemId = btnType.getAttribute('data-id');
            const inputText = evt.target.innerText.trim();
            inputType.value = itemId;
            textType.textContent = inputText;
            console.log(inputType.value);
        });
    });

    // -------------------

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