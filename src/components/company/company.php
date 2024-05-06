<?php
session_start();
include_once("../../../layouts/head.php");
?>
<div class="max-w-3xl mx-auto bg-white p-16 h-screen ">
    <h2 class=" text-center font-medium text-3xl mb-[40px]">Complete sus datos</h2>
    <form method="POST" action="../../services/company-service/create-cp-service.php">
        <div class="grid gap-6 mb-6 lg:grid-cols-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Empresa</label>
                <input type="text" name="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Empresa">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ruc</label>
                <input type="text" name="doccompany" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678">
            </div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sitio web</label>
            <input type="text" name="webcompany" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="www.empresa.com">
        </div>

        <div class="grid gap-6 mb-6 lg:grid-cols-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dirrecion</label>
                <input type="text" name="adrecompany" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Company">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Telefono</label>
                <input type="text" name="phoncompany" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="923-455-678">
            </div>
        </div>
        <div class="grid gap-6 mb-6 lg:grid-cols-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">R. Social</label>
                <input type="text" name="typecompany" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="sales">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha de Creación</label>
                <input type="date" name="fundation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descripcion</label>
            <input type="text" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Empresa ejemplo">
        </div>
        <div class="flex justify-center gap-6 pb-10">
            <a href="../auth/signup.php"  name="company" class="hover:shadow-form rounded-md bg-white-100 py-2.5 px-8 text-base font-semibold  outline-none text-neutral-950 border">
                Cancelar
            </a>
            <button  class="hover:shadow-form rounded-md bg-[#4F46E5] py-2.5 px-8 text-base font-semibold text-white outline-none">
                <span class="inline-block align-middle">Cancelar</span>
            </button>
        </div>

    </form>

</div>