<div class="space-y-6">
    <!-- Year Founded -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Year Founded <b class="text-red-600">*</b>
        </label>
        <input 
            type="number"
            name="year_founded"
            placeholder="Eg. 1990"
            required
            value="{{ old('year_founded', $data['year_founded'] ?? '') }}"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        />
    </div>

    <!-- Date of Inspection -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Date of Inspection <b class="text-red-600">*</b>
        </label>
        <input 
            type="date"
            name="date_of_inspection"
            required
            value="{{ old('date_of_inspection', $data['date_of_inspection'] ?? '') }}"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">
           NAME OF INSPECTOR : 
        </label><div class="mt-1 block w-full rounded-md p-2  border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200  focus:ring-opacity-50">{{auth()->user()->name??''}}</div>
    </div>

    <!-- Philosophy -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Philosophy/Objective of the School <b class="text-red-600">*</b>
        </label>
        <textarea 
            name="philosophy"
            required
            placeholder="Describe the school's philosophy or objectives"
            rows="3"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        >{{ old('philosophy', $data['philosophy'] ?? '') }}</textarea>
    </div>

    <!-- Motto -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Motto of the School <b class="text-red-600">*</b>
        </label>
        <input 
            type="text"
            name="motto"
            placeholder="Eg. Knowledge is Power"
            required
            value="{{ old('motto', $data['motto'] ?? '') }}"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        />
    </div>

    <!-- School Fees -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            School Fees <b class="text-red-600">*</b>
        </label>
        <input 
            type="text"
            name="school_fees"
            placeholder="Eg. ₦50,000 per term"
            required
            value="{{ old('school_fees', $data['school_fees'] ?? '') }}"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        />
    </div>

    <!-- Salary of Teachers -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Salary of Teachers <b class="text-red-600">*</b>
        </label>
        <input 
            type="text"
            name="salary_of_teachers"
            placeholder="Eg. ₦30,000 - ₦100,000 monthly"
            required
            value="{{ old('salary_of_teachers', $data['salary_of_teachers'] ?? '') }}"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        />
    </div>

    <!-- Physical Facilities -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Physical Facilities <b class="text-red-600">*</b>
        </label>
        <textarea 
            name="physical_facilities"
            placeholder="Eg. The school is on its permanent site with..."
            required
            rows="3"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        >{{ old('physical_facilities', $data['physical_facilities'] ?? '') }}</textarea>
    </div>

    <!-- Learning Facilities -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Learning Facilities <b class="text-red-600">*</b>
        </label>
        <textarea 
            name="learning_facilities"
            placeholder="Eg. There are adequate textbooks, lab equipment..."
            required
            rows="3"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        >{{ old('learning_facilities', $data['learning_facilities'] ?? '') }}</textarea>
    </div>

    <!-- Games Facilities -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Games Facilities <b class="text-red-600">*</b>
        </label>
        <textarea 
            name="games_facilities"
            placeholder="Eg. The sports facilities available are football field, volleyball court..."
            required
            rows="3"
            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        >{{ old('games_facilities', $data['games_facilities'] ?? '') }}</textarea>
    </div>
</div>