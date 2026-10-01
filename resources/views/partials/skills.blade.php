{{-- 🔧 SECTION SKILLS: Lebih rapat ke atas --}}
<section class="skills-section" id="skills-section" style="padding-top: 20px;">
    <div class="container">
        {{-- PERUBAHAN: pb-4 → pb-2, jarak ke grid lebih rapat --}}
        <div class="row justify-content-center pb-2">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Skills</span>
                {{-- PERUBAHAN: mb-4 → mb-3, heading lebih rapat ke grid --}}
                <h2 class="mb-3 skills-main-title">My Skills</h2>
            </div>
        </div>

        <div class="skills-grid">
            @foreach($skillCategories as $categoryName => $categoryIcon)
                <div class="skill-category">
                    {{-- Header Kategori --}}
                    <div class="category-header">
                        <i class="fa {{ $categoryIcon }}"></i>
                        <h3>{{ $categoryName }}</h3>
                    </div>

                    {{-- Kartu Skill --}}
                    @forelse($skills[$categoryName] ?? [] as $skill)
                        <div class="skill-card">
                            <div class="skill-icon-box">
                                @if($skill->hasImageIcon())
                                    <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}">
                                @else
                                    <i class="fa {{ $skill->icon_glyph }}"></i>
                                @endif
                            </div>
                            <div class="skill-content">
                                <div class="skill-header">
                                    <h4 class="skill-title">{{ $skill->name }}</h4>
                                </div>

                                @if(!empty($skill->subtitle))
                                    <div class="skill-subtitle">{{ $skill->subtitle }}</div>
                                @endif

                                @if(!empty($skill->description))
                                    <p class="skill-desc">{{ $skill->description }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="skill-card" style="opacity:.5;">
                            <p class="m-0 text-muted small">Belum ada skill di kategori ini.</p>
                        </div>
                    @endforelse
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
	/* ====== SKILLS SECTION: Padding HP ====== */
	@media (max-width: 767px) {
		#skills-section {
			padding: 15px 0 30px 0 !important;
			margin: 0 !important;
			background: #fff !important;
		}
		#skills-section .container {
			padding: 0 !important;
			margin: 0 !important;
		}
		#skills-section .row {
			margin: 0 !important;
			padding: 0 !important;
		}
		#skills-section .heading-section {
			margin-bottom: 10px !important;
			padding-bottom: 0 !important;
		}
		#skills-section .heading-section h2 {
			margin-bottom: 0 !important;
		}
		#skills-section .pb-4 {
			padding-bottom: 0 !important;
		}
	}
</style>