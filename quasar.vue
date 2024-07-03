<!-- ========================================================================= Quasar / VUE =============================================================================== -->

<!-- Ссылка https://quasar.dev/vue-components/uploader -->

<!-- ========================================================================= СТРУКТУРА СТРАНИЦЫ =================================================================================== -->

<template>
	<q-layout>
		<q-page>
			<!-- Верстка -->
		</q-page>
	</q-layout>
</template>

<!-- ========================================================================= ТЕКСТОВКИ =================================================================================== -->

<!-- Заголовки  -->
<div class="text-h1 text-white">Заголовок 1</div> 
<div class="text-h2 text-white">Заголовок 2</div> 
<div class="text-h3 text-white">Заголовок 3</div> 
<div class="text-h4 text-white">Заголовок 4</div> 
<div class="text-h5 text-white">Заголовок 5</div> 
<div class="text-h6 text-white">Заголовок 6</div> 

<!-- Текстовые  -->
<div class="text-body1 text-grey-10">Текст</div>
<div class="text-body2 text-grey-10">Текст</div>
<div class="text-title-middle text-grey-10">Создание нового товара / услуги</div>

<!-- Текст в регистре  -->
<div class="text-body1 text-grey-10" caps>Текст</div>

<!-- Текст без регистра -->
<div class="text-body1 text-grey-10" no-caps>Текст</div>

<!-- Элемент с hover  -->
<div class="text-body1 text-grey-10" hover>Текст</div>

<!-- Элемент без hover  -->
<div class="text-body1 text-grey-10" no-hover>Текст</div>

<!-- ========================================================================= ОТСТУПЫ =================================================================================== -->

<!-- PADDING ==========================================  -->

<!-- Paadding-top None  -->
q-pt-none

<!-- Paadding-top 8px  -->
q-pt-xs

<!-- Paadding-top 16px  -->
q-pt-sm

<!-- Paadding-top 24px  -->
q-pt-md

<!-- Paadding-top 32px  -->
q-pt-lg

<!-- Paadding-top 48px  -->
q-pt-xl

<!-- Paadding-bottom None  -->
q-pb-none

<!-- Paadding-bottom 8px  -->
q-pb-xs

<!-- Paadding-bottom 16px  -->
q-pb-sm
 
<!-- Paadding-bottom 24px  -->
q-pb-md
 
<!-- Paadding-bottom 32px  -->
q-pb-lg

<!-- Paadding-bottom 48px  -->
q-pb-xl

<!-- Paadding-None  -->
q-pl-none

<!-- Paadding-left 8px  -->
q-pl-xs

<!-- Paadding-left 16px  -->
q-pl-sm

<!-- Paadding-left 24px  -->
q-pl-md

<!-- Paadding-left 32px  -->
q-pl-lg

<!-- Paadding-left 48px  -->
q-pl-xl

<!-- Paadding-None  -->
q-pr-none

<!-- Paadding-right 8px  -->
q-pr-xs

<!-- Paadding-right 16px  -->
q-pr-sm
 
<!-- Paadding-right 24px  -->
q-pr-md
 
<!-- Paadding-right 32px  -->
q-pr-lg
 
<!-- Paadding-right 48px  -->
q-pr-xl

<!-- MARGIN ==========================================  -->

<!-- Margin-top None  -->
q-mt-none

<!-- Margin-top 8px  -->
q-mt-xs

<!-- Margin-top 16px  -->
q-mt-sm

<!-- Margin-top 24px  -->
q-mt-md

<!-- Margin-top 32px  -->
q-mt-lg

<!-- Margin-top 48px  -->
q-mt-xl

<!-- Margin-bottom None  -->
q-mb-none

<!-- Margin-bottom 8px  -->
q-mb-xs

<!-- Margin-bottom 16px  -->
q-mb-sm
 
<!-- Margin-bottom 24px  -->
q-mb-md

<!-- Margin-bottom 32px  -->
q-mb-lg

<!-- Margin-bottom 48px  -->
q-mb-xl

<!-- Margin-left-None  -->
q-ml-none

<!-- Margin-left 8px  -->
q-ml-xs

<!-- Margin-left 16px  -->
q-ml-sm

<!-- Margin-left 24px  -->
q-ml-md

<!-- Margin-left 32px  -->
q-ml-lg

<!-- Margin-left 48px  -->
q-ml-xl

<!-- Margin-left Auto  -->
q-ml-xl

<!-- Margin-right None  -->
q-mr-none

<!-- Margin-right 8px  -->
q-mr-xs

<!-- Margin-right 16px  -->
q-mr-sm
 
<!-- Margin-right 24px  -->
q-mr-md
 
<!-- Margin-right 32px  -->
q-mr-lg
 
<!-- Margin-right 48px  -->
q-mr-xl


<!-- ========================================================================= КНОПКИ =================================================================================== -->

<!-- Кнопка с текстом  -->
<q-btn color="primary" class="btn-close btn-no-effects">
	<q-icon name="svguse:icons/allIcons.svg#close-modal-out" color="white" size="32px" />
	<span>Кнопка</span>
</q-btn>

<!-- Кнопка с лейблом -->
<q-btn class="q-btn-no text-h6 no-hover text-grey-10" outline flat label="Отмена" type="reset" primary/>

<!-- Кнопка без иконки  -->
<q-btn unelevated color="blue-1" class="my-btn q-mr-md text-weight-bold">
	<span class="block">Сохранить</span>
</q-btn>

<!-- Кнопка открытия модального окна  -->
<q-btn unelevated color="blue-1" class="my-btn q-mb-md text-weight-bold" no-caps @click="dialogCategoryModal = true">
	<span class="block">Новая Категория</span>
</q-btn>

<!-- ========================================================================= INPUTS ====================================================================================== -->

<q-input class="q-mr-lg q-mb-lg" type="number" filled label="Цена продажи" v-model="input" style="border-radius: 0.375rem; overflow: hidden; max-width: 312px; width: 100%;"/>

<!-- ========================================================================= CHECKBOX ====================================================================================== -->

<q-checkbox size="lg" v-model="show" val="lg" label="Показать все" class="text-h6" style="color: #ADC4FC;" />

<!-- ========================================================================= ВЫПАДАЮЩИЙ СПИСОК ====================================================================================== -->

<q-expansion-item class="text-h6 text-grey-10 no-hover" expand-separator label="История операций">
	<q-card>
		<q-card-section class="bg-dark-panel text-body2">
			Текст
		</q-card-section>
	</q-card>
</q-expansion-item>

<!-- ========================================================================= SEPARATOR =================================================================================== -->

<q-separator style="background-color: #25272D;" />

<!-- ========================================================================= DIALOG =================================================================================== -->

<!-- Кнопка вызова окна  -->
<q-btn unelevated color="blue-1" class="my-btn" @click="dialogNewCategoryModal = true">
	<span class="block">Новая Категория</span>
</q-btn>

<!-- Окно Категории  -->
<q-dialog v-model="dialogCategoryModal"> 
	<q-card class="column justify-between q-card-activ bg-blue-grey-9 q-pt-xs q-pb-md" style="max-width: 832px; width: 100%; min-height: 440px;">
		<!-- Header  -->
		<q-card-section class="row items-center q-pl-xl">
			Content
		</q-card-section>
			<!-- Body  -->
			<q-card-section class="row items-center q-pt-xl q-pr-xl q-pl-xl">
				Content
			</q-card-section>
			<!-- Footer  -->
			<q-card-section class="row justify-between items-center">
				Content
			</q-card-section>
	</q-card>
</q-dialog>

<!-- Вызов компонента окна  -->
<q-dialog
	v-model="dialogPromoModal"
	class="dialog-full"
	position="right"
>
	<PromoModal />
</q-dialog>

<!-- Большое боковое окно -->
<q-card class="modal-card bg-blue-grey-9" style="height: 100%;">
	<q-btn color="primary" class="btn-close btn-no-effects" v-close-popup>
	 <q-icon name="svguse:icons/allIcons.svg#close-modal-out" color="white" size="32px" />
	</q-btn>

	<q-card-section class="modal-card__sec q-pt-md q-pl-lg q-pr-xl q-pb-lg" style="display: flex; flex-direction: column; min-height: 100%;">

	 <q-card-section class="modal-card__wrapper" style="padding: 10px 20px 40px 20px; flex: 1 1 auto">

		 <!-- Header -->
		 <q-card-section class="modal-card__header" style="padding: 0 0 32px 0;">
			  <div class="text-title-middle text-grey-10">Создание нового товара / услуги</div>
		 </q-card-section>

		 <q-card-section class="modal-card__body body-modal" style="height: 730px; overflow: auto;">

		 </q-card-section>

	 </q-card-section>

	 <q-card-section class="modal-card__footer">
		 <!-- Bottom-Buttons-Panel -->
		 <div class="body-modal__row row justify-between items-center" style="padding: 10px;">
		  <div class="col-auto">
			  <q-btn class="q-btn-no text-h6 no-hover text-grey-10" outline flat label="Отмена" type="reset" primary/>
		  </div>
		  <div class="col-auto">
			  <q-btn unelevated color="blue-1" class="my-btn q-mr-md text-weight-bold">
				<span class="block">Сохранить</span>
			  </q-btn>
		  </div>
		 </div>
	 </q-card-section>

	</q-card-section>
</q-card>

<!-- ======================================================== ПОДКЛЮЧЕНИЕ КОМПОНЕНТОВ =================================================================================== -->
<template>

	<MyComponent />
	<my-component></my-component>

</template>

<script>
import { ref } from 'vue';
import MyComponent from 'src/components/MyComponent.vue';

export default {
  components: {
	MyComponent,
  },
};
	
</script>
<!-- //======================================================================================================================================================== -->
