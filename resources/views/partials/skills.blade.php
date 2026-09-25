{{-- 🔧 DIUBAH TOTAL: section skills 3 kolom kategori, tanpa persentase --}}
<section class="skills-section" id="skills-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Skills</span>
                <h2 class="mb-4 skills-main-title">My Skills</h2>
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