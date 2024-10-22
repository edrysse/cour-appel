@php
    $notices = App\Models\Notice::get();
@endphp
@include('index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<style>
    select {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 4px;
    border: solid 1px #bfbfbf;
    transition: border-color 0.3s ease;
    background-color: white;
    position: relative;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: left .75rem center;
    background-size: 16px 12px;
    width: 40%;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}


</style>
</head>
<body>
        

    <x-landing-section_head />
    <x-admin_navbar/>
        
<div class="testSectionIssue">
    <form action="{{ route('born.send') }}" method="POST">
        @csrf
        <div class="testForm">
            <div class="testFormOne"></div>
            <div class="testFormTwo">
                <div class="testFormTwoTwo" style="padding: 15px 0 5px 0">ملئ  طلب الولادة</div>
                <div class="testFormOne">
                    @if ($errors->any())
                        <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
                    @endif
                </div>
                <div><span>(*) يجب ملء الخانات التي تحتوي على</span></div>
                <div class="testFormTwoFour">
                    <input type="text" id="" class="test-field" name="born_name" value="{{ auth()->user()->admin_name }}" readonly>
                    <label for="" class="test-label" id="" style="top: 0;background: white; color: green; padding: 0 5px; font-size: 13px"><span>*  </span>إسم الموظف</label>
                </div>
                <div class="testFormTwoFour">
                    <input type="text" id="" class="test-field" name="born_cadre" value="{{ auth()->user()->cadre }}" readonly>
                    <label for="" class="test-label" id="" style="top: 0;background: white; color: green; padding: 0 5px; font-size: 13px"><span>*  </span>نوع عمل الموظف</label>
                </div>
                <div class="testFormTwoFour">
                    <input type="text" id="" class="test-field" name="born_rental" value="{{ auth()->user()->rental_number }}" readonly>
                    <label for="" class="test-label" id="" style="top: 0;background: white; color: green; padding: 0 5px; font-size: 13px"><span>*  </span>رقم تأجير الموظف</label>
                </div>
                <div class="testTitle" style="padding: 15px 0 5px 0">تاريخ الولادة المتوقع</div>
                <div class="testFormTwoFive">
                    <div class="testFormTwoFiveOne">
                        <input type="hidden" name="born_on_day" id="daya" value="{{ old('born_on_day') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_on_day')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">اليوم</div>
                            <ul class="testdropdown-list">
                                @for ($day = 1; $day <= 31; $day++)
                                <li value="{{ $day }}">{{ $day }}</li>
                            @endfor
                            </ul>
                            <label for="" class=""><span>*  </span>اليوم</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoFiveOne .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoFiveOne .testdropdown-list");
                                let inpGender = document.querySelector('#daya');
                        
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = inpGender.value;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.textContent;
                                    }
                                });
                            });
                        </script>



                    </div>
                    <div class="testFormTwoFiveTwo">
                        <input type="hidden" name="born_on_month" id="montha" value="{{ old('born_on_month') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_on_month')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">الشهر</div>
                            <ul class="testdropdown-list">
                                @php
    $arabicMonths = [
        'يناير',
        'فبراير',
        'مارس',
        'إبريل',
        'مايو',
        'يونيو',
        'يوليو',
        'أغسطس',
        'سبتمبر',
        'أكتوبر',
        'نوفمبر',
        'ديسمبر'
    ];
@endphp

@for ($month = 1; $month <= 12; $month++)
    <li value="{{ $month }}">{{ $arabicMonths[$month - 1] }}</li>
@endfor

                            </ul>
                            <label for="" class=""><span>*  </span>الشهر</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoFiveTwo .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoFiveTwo .testdropdown-list");
                                let inpGender = document.querySelector('#montha');

                                const arabicMonths = [
                                        'يناير',
                                        'فبراير',
                                        'مارس',
                                        'إبريل',
                                        'مايو',
                                        'يونيو',
                                        'يوليو',
                                        'أغسطس',
                                        'سبتمبر',
                                        'أكتوبر',
                                        'نوفمبر',
                                        'ديسمبر'
                                    ];
                        
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = arabicMonths[inpGender.value - 1];
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.value;
                                    }
                                });
                            });
                        </script>



                    </div>
                    
                    <div class="testFormTwoFiveThree">
                        <input type="hidden" name="born_on_year" id="yeara" value="{{ old('born_on_year') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_on_year')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">السنة</div>
                            <ul class="testdropdown-list">
                                @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                            <li value="{{ $year }}">{{ $year }}</li>
                        @endfor
                            </ul>
                            <label for="" class=""><span>*  </span>السنة</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoFiveThree .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoFiveThree .testdropdown-list");
                                let inpGender = document.querySelector('#yeara');
                        
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = inpGender.value;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.textContent;
                                    }
                                });
                            });
                        </script>



                    </div>
                </div>
                
                <div class="testFormTwoFour">
                    <input type="number" id="b" name="born_duree" class="test-field @if ($errors->has('born_duree')) errorInput @endif" onchange="handleCheck1('b','n')" value="{{ old('born_duree') }}">
                    <label for="" class="test-label" id="n"><span>*  </span>مدة الإجازة باليوم</label>
                </div>
                <div class="testTitleTwo" style="padding: 12px 0 5px 0">تاريخ بداية الإجازة</div>
                <div class="testFormTwoFive">
                    <div class="testFormTwoSixOne">
                        <input type="hidden" name="born_start_day" id="dayb" value="{{ old('born_start_day') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_start_day')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">اليوم</div>
                            <ul class="testdropdown-list">
                                @for ($day = 1; $day <= 31; $day++)
                                <li value="{{ $day }}">{{ $day }}</li>
                            @endfor
                            </ul>
                            <label for="" class=""><span>*  </span>اليوم</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoSixOne .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoSixOne .testdropdown-list");
                                let inpGender = document.querySelector('#dayb');
                        
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = inpGender.value;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.textContent;
                                    }
                                });
                            });
                        </script>


                    </div>
                    <div class="testFormTwoSixTwo">
                        <input type="hidden" name="born_start_month" id="monthb" value="{{ old('born_start_month') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_start_month')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">الشهر</div>
                            <ul class="testdropdown-list">
                                @php
                                    $arabicMonths = [
                                        'يناير',
                                        'فبراير',
                                        'مارس',
                                        'إبريل',
                                        'مايو',
                                        'يونيو',
                                        'يوليو',
                                        'أغسطس',
                                        'سبتمبر',
                                        'أكتوبر',
                                        'نوفمبر',
                                        'ديسمبر'
                                    ];
                                @endphp

                                @for ($month = 1; $month <= 12; $month++)
                                    <li value="{{ $month }}">{{ $arabicMonths[$month - 1] }}</li>
                                @endfor

                            </ul>
                            <label for="" class=""><span>*  </span>الشهر</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoSixTwo .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoSixTwo .testdropdown-list");
                                let inpGender = document.querySelector('#monthb');
                                const arabicMonths = [
                                        'يناير',
                                        'فبراير',
                                        'مارس',
                                        'إبريل',
                                        'مايو',
                                        'يونيو',
                                        'يوليو',
                                        'أغسطس',
                                        'سبتمبر',
                                        'أكتوبر',
                                        'نوفمبر',
                                        'ديسمبر'
                                    ];
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = arabicMonths[inpGender.value - 1];
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.value;
                                    }
                                });
                            });
                        </script>




                    </div>
                    
                    <div class="testFormTwoSixThree">
                        <input type="hidden" name="born_start_year" id="yearb" value="{{ old('born_start_year') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_start_year')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">السنة</div>
                            <ul class="testdropdown-list">
                                @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                            <li value="{{ $year }}">{{ $year }}</li>
                        @endfor
                            </ul>
                            <label for="" class=""><span>*  </span>السنة</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoSixThree .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoSixThree .testdropdown-list");
                                let inpGender = document.querySelector('#yearb');
                        
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = inpGender.value;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.textContent;
                                    }
                                });
                            });
                        </script>


                    </div>
                </div>


                <div class="testTitleTwo" style="padding: 10px 0 5px 0">تاريخ العودة من الإجازة</div>
                <div class="testFormTwoFive">
                    <div class="testFormTwoSixSix">
                        <input type="hidden" name="born_back_day" id="dayc" value="{{ old('born_back_day') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_back_day')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">اليوم</div>
                            <ul class="testdropdown-list">
                                @for ($day = 1; $day <= 31; $day++)
                                <li value="{{ $day }}">{{ $day }}</li>
                            @endfor
                            </ul>
                            <label for="" class=""><span>*  </span>اليوم</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoSixSix .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoSixSix .testdropdown-list");
                                let inpGender = document.querySelector('#dayc');
                        
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = inpGender.value;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.textContent;
                                    }
                                });
                            });
                        </script>


                    </div>
                    <div class="testFormTwoSixSeven">
                        <input type="hidden" name="born_back_month" id="monthc" value="{{ old('born_back_month') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_back_month')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">الشهر</div>
                            <ul class="testdropdown-list">
                                @php
                                    $arabicMonths = [
                                        'يناير',
                                        'فبراير',
                                        'مارس',
                                        'إبريل',
                                        'مايو',
                                        'يونيو',
                                        'يوليو',
                                        'أغسطس',
                                        'سبتمبر',
                                        'أكتوبر',
                                        'نوفمبر',
                                        'ديسمبر'
                                    ];
                                @endphp

                                @for ($month = 1; $month <= 12; $month++)
                                    <li value="{{ $month }}">{{ $arabicMonths[$month - 1] }}</li>
                                @endfor

                            </ul>
                            <label for="" class=""><span>*  </span>الشهر</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoSixSeven .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoSixSeven .testdropdown-list");
                                let inpGender = document.querySelector('#monthc');
                                const arabicMonths = [
                                        'يناير',
                                        'فبراير',
                                        'مارس',
                                        'إبريل',
                                        'مايو',
                                        'يونيو',
                                        'يوليو',
                                        'أغسطس',
                                        'سبتمبر',
                                        'أكتوبر',
                                        'نوفمبر',
                                        'ديسمبر'
                                    ];
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = arabicMonths[inpGender.value - 1];
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.value;
                                    }
                                });
                            });
                        </script>




                    </div>
                    
                    <div class="testFormTwoSixNine">
                        <input type="hidden" name="born_back_year" id="yearc" value="{{ old('born_back_year') }}">
                        <div class="dropdown testtheDropdown @if ($errors->has('born_back_year')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">السنة</div>
                            <ul class="testdropdown-list">
                                @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                            <li value="{{ $year }}">{{ $year }}</li>
                        @endfor
                            </ul>
                            <label for="" class=""><span>*  </span>السنة</label>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const dropdownBtn = document.querySelector(".testFormTwoSixNine .dropdown-btn");
                                const dropdownList = document.querySelector(".testFormTwoSixNine .testdropdown-list");
                                let inpGender = document.querySelector('#yearc');
                        
                                function updateDropdownText() {
                                    if (inpGender.value.trim() !== '') {
                                        dropdownBtn.textContent = inpGender.value;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                    }else{
                                        dropdownBtn.classList.remove('choosed');
                                        dropdownBtn.classList.add('notChoosed');
                                    }
                                }
                        
                                updateDropdownText();
                        
                                inpGender.addEventListener("input", updateDropdownText);
                        
                                dropdownBtn.addEventListener("click", function() {
                                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                                });
                        
                                dropdownList.addEventListener("click", function(e) {
                                    if (e.target.tagName === "LI") {
                                        dropdownBtn.textContent = e.target.textContent;
                                        dropdownBtn.classList.remove('notChoosed');
                                        dropdownBtn.classList.add('choosed');
                                        dropdownList.style.display = "none";
                                        inpGender.value = e.target.textContent;
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="testSubmit"><button type="submit">حفظ</button></div>
            </div>
            <div class="testFormThree"></div>
        </div>
    </form>
    
</div>

<div class="footer-section">

    <div class="footerTheOne">


       
        <div class="a">
            <div class="aUn"><h5>روابط مفيدة</h5></div>
            <div class="aDeux"></div>
            
        </div>



        <div class="img">
            <div class="imgUn"><img src="https://www.mahakim.ma/assets/images/line.svg" alt=""></div>
            <div class="imgDeux"></div>
            
        </div>

        <div class="b">
                <div class="bNav">
                    <ul class="bUnOne">
                        <li><a href="{{ route('website') }}" style="text-decoration: none">تقديم الموقع</a></li>
                        <li><a href="{{ route('histoire') }}" style="text-decoration: none">لمحة تاريخية</a></li>
                        <li><a href="{{ route('lows') }}" style="text-decoration: none">القوانين والتشريعات</a></li>
                        <li><a href="{{ route('contact') }}" style="text-decoration: none">إتصل بنا</a></li>
                      </ul>
                </div>


                <div></div>




            
        </div>


        <div class="haha">
            <div class="hahaImg"><img src="/img/footerImg.png" alt=""></div>
            <div></div>
        </div>


    </div>

    








    <div class="footerThetwo">


       
        <div class="a">
            <div class="aUn"><h5>رابط رئاسة النيابة العامة</h5></div>
            <div class="aDeux"></div>
            
        </div>



        <div class="img">
            <div class="imgUn"><img src="https://www.mahakim.ma/assets/images/line.svg" alt=""></div>
            <div class="imgDeux"></div>
            
        </div>

<a href="https://www.pmp.ma/" target="_blank">
<div class="haha">
    <div class="hahaImg"><img src="/img/niyaba.png" alt=""></div>
    <div></div>
    
</div>
</a>
        


    </div>









    <div class="footerThetwo">


       
        <div class="a">
            <div class="aUn"><h5>رابط وزارة العدل</h5></div>
            <div class="aDeux"></div>
            
        </div>



        <div class="img">
            <div class="imgUn"><img src="https://www.mahakim.ma/assets/images/line.svg" alt=""></div>
            <div class="imgDeux"></div>
            
        </div>

<a href="">
<div class="haha">
    <div class="hahaImg"><img src="https://www.mahakim.ma/assets/images/logo/ministere_white.svg" alt=""></div>
    <div></div>
    
</div>
</a>
        


    </div>



    <div class="footerTheThree">


        <div class="un">
            <div class="unUn"><h5>معلومات الاتصال</h5></div>
            <div class="unDeux"></div>
            
        </div>

        <div class="img">
            <div class="imgUn"><img src="https://www.mahakim.ma/assets/images/line.svg" alt=""></div>
            <div class="imgDeux"></div>
            
        </div>
        

        <div class="deux">
            
            <div class="deuxUn"><span style="color: #ffc221; font-size: 22px">العنوان</span>
                <p>مَحكَمة الإسْتئنَاف : شارع سمارة، ص.ب 1015، العيون، المغرب</p></div>
            <div class="deuxDeux"><img src="https://www.mahakim.ma/assets/images/logo/position.svg" alt=""></div>
        </div>


        <div class="trois">
            <div class="troisUn"><span style="color: #ffc221; font-size: 22px">رقم الهاتف</span>
                <p>+212(0)537213737</p></div>
            <div class="troisDeux"><img src="https://www.mahakim.ma/assets/images/logo/phone.svg" alt=""></div>
        </div>
        
    </div>
    <div class="copyRight">
        <p>جميع الحقوق محفوظة - <span style="color: #ffc221">مَحكَمة الإسْتئنَاف</span> © 2024</p>
    </div>
</div>
    <script src="/js/main.js"></script>


    <script>
        
        function handleCheck1(id, idd) {
            const selectElements = document.getElementById(id);
            const label = document.getElementById(idd);

            if (selectElements.value.trim() !== '') {
                label.classList.remove('test-label');
                label.classList.add('test-labelS');
            } else {
                label.classList.remove('test-labelS');
                label.classList.add('test-label');
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            handleCheck1('l', 'm');
        });
        document.addEventListener("DOMContentLoaded", function() {
            handleCheck1('w','x');
        });

        document.addEventListener("DOMContentLoaded", function() {
            handleCheck1('c','v');
        });
        document.addEventListener("DOMContentLoaded", function() {
            
        handleCheck1('b','n');
        });


        document.addEventListener("DOMContentLoaded", function() {
            
            handleCheck1('a','z');
            });
            document.addEventListener("DOMContentLoaded", function() {
            
                handleCheck1('e','r');
                });
                document.addEventListener("DOMContentLoaded", function() {
            
                    handleCheck1('t','y');
                    });
    </script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = 'نافذة الحق' + ' - ' + 'ملئ طلب الولادة';
    });
  </script>

</body>
</html>