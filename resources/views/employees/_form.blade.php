<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    <!-- Personal Details -->
    <div>
        <label class="text-gray-700 font-medium" for="nip">NIP</label>
        <input id="nip" name="nip" type="text" value="{{ old('nip', $employee->nip ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('nip') border-red-500 @enderror">
        @error('nip')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="full_name">Full Name</label>
        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $employee->full_name ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('full_name') border-red-500 @enderror">
        @error('full_name')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $employee->email ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-500 @enderror">
        @error('email')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="phone_number">Phone Number</label>
        <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number', $employee->phone_number ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('phone_number') border-red-500 @enderror">
        @error('phone_number')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="gender">Gender</label>
        <select id="gender" name="gender" class="w-full mt-2 px-4 py-2 border rounded-md bg-white focus:border-blue-500 focus:ring-blue-500 @error('gender') border-red-500 @enderror">
            <option value="">Select Gender</option>
            <option value="Laki-laki" {{ old('gender', $employee->gender ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('gender', $employee->gender ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('gender')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="text-gray-700 font-medium" for="birth_place">Birth Place</label>
            <input id="birth_place" name="birth_place" type="text" value="{{ old('birth_place', $employee->birth_place ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('birth_place') border-red-500 @enderror">
            @error('birth_place')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
        </div>
        <div>
            <label class="text-gray-700 font-medium" for="birth_date">Birth Date</label>
            <input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date', isset($employee) ? $employee->birth_date->format('Y-m-d') : '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('birth_date') border-red-500 @enderror">
            @error('birth_date')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
        </div>
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="blood_type">Blood Type</label>
        <input id="blood_type" name="blood_type" type="text" value="{{ old('blood_type', $employee->blood_type ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('blood_type') border-red-500 @enderror">
        @error('blood_type')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="religion">Religion</label>
        <input id="religion" name="religion" type="text" value="{{ old('religion', $employee->religion ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('religion') border-red-500 @enderror">
        @error('religion')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="marital_status">Marital Status</label>
        <select id="marital_status" name="marital_status" class="w-full mt-2 px-4 py-2 border rounded-md bg-white focus:border-blue-500 focus:ring-blue-500 @error('marital_status') border-red-500 @enderror">
            <option value="">Select Status</option>
            <option value="Belum Kawin" {{ old('marital_status', $employee->marital_status ?? '') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
            <option value="Kawin" {{ old('marital_status', $employee->marital_status ?? '') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
            <option value="Cerai" {{ old('marital_status', $employee->marital_status ?? '') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
        </select>
        @error('marital_status')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div class="md:col-span-2">
        <label class="text-gray-700 font-medium" for="address">Address</label>
        <textarea id="address" name="address" rows="3" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address', $employee->address ?? '') }}</textarea>
        @error('address')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="city">City</label>
        <input id="city" name="city" type="text" value="{{ old('city', $employee->city ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('city') border-red-500 @enderror">
        @error('city')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="join_date">Join Date</label>
        <input id="join_date" name="join_date" type="date" value="{{ old('join_date', isset($employee) ? $employee->join_date->format('Y-m-d') : '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('join_date') border-red-500 @enderror">
        @error('join_date')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="employment_status">Employment Status</label>
        <select id="employment_status" name="employment_status" class="w-full mt-2 px-4 py-2 border rounded-md bg-white focus:border-blue-500 focus:ring-blue-500 @error('employment_status') border-red-500 @enderror">
            <option value="">Select Status</option>
            <option value="Tetap" {{ old('employment_status', $employee->employment_status ?? '') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
            <option value="Kontrak" {{ old('employment_status', $employee->employment_status ?? '') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
            <option value="Magang" {{ old('employment_status', $employee->employment_status ?? '') == 'Magang' ? 'selected' : '' }}>Magang</option>
        </select>
        @error('employment_status')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="basic_salary">Basic Salary (IDR)</label>
        <input id="basic_salary" name="basic_salary" type="number" step="0.01" value="{{ old('basic_salary', $employee->basic_salary ?? '') }}" class="w-full mt-2 px-4 py-2 border rounded-md focus:border-blue-500 focus:ring-blue-500 @error('basic_salary') border-red-500 @enderror">
        @error('basic_salary')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <!-- Relationships -->
    <div>
        <label class="text-gray-700 font-medium" for="department_id">Department</label>
        <select id="department_id" name="department_id" class="w-full mt-2 px-4 py-2 border rounded-md bg-white focus:border-blue-500 focus:ring-blue-500 @error('department_id') border-red-500 @enderror">
            <option value="">Select Department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id ?? '') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
            @endforeach
        </select>
        @error('department_id')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="position_id">Position</label>
        <select id="position_id" name="position_id" class="w-full mt-2 px-4 py-2 border rounded-md bg-white focus:border-blue-500 focus:ring-blue-500 @error('position_id') border-red-500 @enderror">
            <option value="">Select Position</option>
            @foreach($positions as $pos)
                <option value="{{ $pos->id }}" {{ old('position_id', $employee->position_id ?? '') == $pos->id ? 'selected' : '' }}>{{ $pos->name }} ({{ $pos->level }})</option>
            @endforeach
        </select>
        @error('position_id')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="text-gray-700 font-medium" for="education_id">Education</label>
        <select id="education_id" name="education_id" class="w-full mt-2 px-4 py-2 border rounded-md bg-white focus:border-blue-500 focus:ring-blue-500 @error('education_id') border-red-500 @enderror">
            <option value="">Select Education</option>
            @foreach($educations as $edu)
                <option value="{{ $edu->id }}" {{ old('education_id', $employee->education_id ?? '') == $edu->id ? 'selected' : '' }}>{{ $edu->degree }} - {{ $edu->institution_name }}</option>
            @endforeach
        </select>
        @error('education_id')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="flex items-center mt-6">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $employee->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
            <span class="ml-2 text-gray-700 font-medium">Is Active Employee?</span>
        </label>
    </div>
</div>
