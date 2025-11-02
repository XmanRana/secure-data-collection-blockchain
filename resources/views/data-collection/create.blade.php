<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center space-y-3">
            <div class="flex items-center space-x-4">
                <!-- Shield with subtle floating animation -->
                <svg class="w-16 h-16 text-indigo-600 animate-float" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" focusable="false">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l9-4.5-9-4.5-9 4.5 9 4.5zM12 22l9-4.5v-7.5L12 22zM12 22l-9-4.5v-7.5L12 22z" />
                </svg>
                <h1 class="text-4xl font-extrabold text-indigo-700 select-none">Secure Portal</h1>
            </div>

            <!-- Marquee with improved style -->
            <marquee class="w-full max-w-3xl px-4 py-2 rounded-lg bg-indigo-100 text-indigo-700 font-semibold uppercase tracking-widest shadow-inner" behavior="scroll" direction="left" scrollamount="5" aria-label="Important scrolling text">
                🔒 Your data is encrypted with AES-256 &nbsp;&nbsp;&nbsp;&nbsp; • &nbsp;&nbsp;&nbsp;&nbsp; 🧠 AI validation ensures accuracy &nbsp;&nbsp;&nbsp;&nbsp; • &nbsp;&nbsp;&nbsp;&nbsp; ⛓️ Blockchain recording guarantees immutability
            </marquee>
        </div>
    </x-slot>

    <div class="py-14 max-w-3xl mx-auto mt-6 px-6 bg-white rounded-3xl shadow-lg border border-indigo-300">
        <form method="POST" action="{{ route('data.store') }}" enctype="multipart/form-data" class="space-y-7">
            @csrf

            <!-- Name -->
            <div>
                <label for="full_name" class="block text-gray-800 font-semibold mb-2">👤 Full Name <span class="text-red-600">*</span></label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name" required
                    class="w-full border-2 border-indigo-300 rounded-lg px-5 py-3 font-semibold text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-600 transition"/>
                @error('full_name')
                    <p class="text-red-600 mt-1 text-sm">❌ {{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-800 font-semibold mb-2">📧 Email Address <span class="text-red-600">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="your.email@example.com" required
                    class="w-full border-2 border-indigo-300 rounded-lg px-5 py-3 font-semibold text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-600 transition"/>
                @error('email')
                    <p class="text-red-600 mt-1 text-sm">❌ {{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-gray-800 font-semibold mb-2">📱 Phone Number <span class="text-red-600">*</span></label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" maxlength="10" placeholder="9876543210" required
                    class="w-full border-2 border-indigo-300 rounded-lg px-5 py-3 font-semibold text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-600 transition"/>
                <p class="text-gray-500 text-xs mt-1">Format: 10 digits without spaces</p>
                @error('phone')
                    <p class="text-red-600 mt-1 text-sm">❌ {{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-gray-800 font-semibold mb-2">🏠 Address <span class="text-red-600">*</span></label>
                <textarea name="address" id="address" rows="3" placeholder="Street, City, State, Postal Code" required
                    class="w-full border-2 border-indigo-300 rounded-lg px-5 py-3 font-semibold text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-600 transition resize-none">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-600 mt-1 text-sm">❌ {{ $message }}</p>
                @enderror
            </div>

            <!-- Document Upload -->
            <div>
                <label for="document" class="block text-gray-800 font-semibold mb-2">📄 Upload Document (Optional)</label>
                <div class="w-full border-2 border-dashed border-indigo-400 rounded-lg p-8 text-center cursor-pointer hover:border-indigo-600 transition flex flex-col items-center justify-center select-none"
                    onclick="document.getElementById('document').click()">
                    <input type="file" id="document" name="document" accept=\".pdf,.doc,.docx,.jpg,.jpeg,.png\" class="hidden">
                    <div class="text-6xl mb-4 select-none">📎</div>
                    <p class="text-indigo-600 font-semibold select-none">Click to upload or drag & drop</p>
                    <p class="mt-1 text-indigo-400 text-sm select-none">PDF, DOC, DOCX, JPG, PNG (max 5MB)</p>
                </div>
                <p id="file-name" class="mt-2 text-green-600 font-semibold select-none"></p>
                @error('document')
                    <p class="text-red-600 mt-1 text-sm">❌ {{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-4 bg-indigo-600 text-[white] font-bold text-lg rounded-lg shadow-lg transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-400 active:scale-95 select-none pulse-btn"
                aria-label="Submit secure data">
                🚀 Submit Secure Data
            </button>

            <!-- Security Features Grid below form -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-16 select-none text-indigo-700">
                <div class="flex flex-col items-center p-6 rounded-lg bg-indigo-50 border border-indigo-300 shadow-md">
                    <div class="text-5xl mb-4 animate-float">🔐</div>
                    <h4 class="font-bold">End-to-End Encryption</h4>
                    <p class="text-center text-sm mt-1">Military-grade AES-256 encryption</p>
                </div>
                <div class="flex flex-col items-center p-6 rounded-lg bg-indigo-50 border border-indigo-300 shadow-md">
                    <div class="text-5xl mb-4 animate-float">🧠</div>
                    <h4 class="font-bold">AI Validation</h4>
                    <p class="text-center text-sm mt-1">Advanced AI pattern recognition</p>
                </div>
                <div class="flex flex-col items-center p-6 rounded-lg bg-indigo-50 border border-indigo-300 shadow-md">
                    <div class="text-5xl mb-4 animate-float">⛓️</div>
                    <h4 class="font-bold">Blockchain Verified</h4>
                    <p class="text-center text-sm mt-1">Immutable transaction records</p>
                </div>
            </div>
        </form>
    </div>

    <script>
        const docInput = document.getElementById('document');
        const fileNameDisplay = document.getElementById('file-name');

        docInput.addEventListener('change', () => {
            if (docInput.files.length > 0) {
                fileNameDisplay.textContent = `✅ ${docInput.files[0].name}`;
            } else {
                fileNameDisplay.textContent = '';
            }
        });

        const submitBtn = document.querySelector('.pulse-btn');
        submitBtn.addEventListener('mousedown', () => {
            submitBtn.classList.add('active-click');
        });
        submitBtn.addEventListener('mouseup', () => {
            submitBtn.classList.remove('active-click');
        });
        submitBtn.addEventListener('mouseleave', () => {
            submitBtn.classList.remove('active-click');
        });
    </script>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
        marquee {
            font-weight: 700;
            letter-spacing: 0.15em;
            border-radius: 10px;
            padding: 6px 16px;
            box-shadow: inset 0 0 15px rgba(99, 102, 241, 0.25);
            background: linear-gradient(135deg, #eef2ff, #dbeafe);
            color: #4338ca;
        }
        .pulse-btn:hover {
            animation: pulse 1.5s infinite;
        }
        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 12px 0 rgba(99,102,241,0.6); }
            50% { box-shadow: 0 0 22px 6px rgba(99,102,241,0.8); }
        }
        .pulse-btn.active-click {
            transform: scale(0.95);
            transition: transform 0.1s ease;
            box-shadow: none;
        }
    </style>
</x-app-layout>
