<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<div id="shopify-section-Ishi_sidebar" class="shopify-section">
            <div data-section-id="Ishi_sidebar" data-section-type="sidebar-section">
               <div class="left-column sidebar-categories">
                  <div class="left-title clearfix hidden-lg-up collapsed" data-target="#subcategories-container" data-toggle="collapse">
                     <span class="h3 block-heading">
                     <a title="">Products By Category</a>
                     </span>
                     <span class="navbar-toggler collapse-icons">
                     <i class="material-icons add"></i>
                     <i class="material-icons remove"></i>
                     </span>    
                  </div>
                  <div class="section-header sidebar-title hidden-lg-down">
                     <a title="">Category</a>
                  </div>
                  <div id="subcategories-container" class="block-categories categories collapse data-toggler">
                     <div class="panel-group categories-menu" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php if(!empty($categoryList)){ ?>
                        <?php foreach($categoryList as $cat){ ?>
                        <div class="panel panel-custom categories-items">
                           <div class="panel-heading" role="tab" id="headingOne-{{$cat['id']}}">
                              <h4 class="panel-title link-title">{{$cat['name']}}
                                 <a class="collapse-icon collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$cat['id']}}" aria-expanded="false" aria-controls="collapse-{{$cat['id']}}">
                                 <i class="material-icons add"></i>
                                 <i class="material-icons remove"></i>
                                 </a>
                              </h4>
                           </div>
                          <!--  <div id="collapse-{{$cat['id']}}" class="panel-collapse dropdown-submenu collapse" role="tabpanel" aria-labelledby="headingOne-{{$cat['id']}}" aria-expanded="false" style="height: 0px;">
                              <div class="panel-body category_submenu">
                                 <a href="/collections/cold-coffee" class="dropdown-item">
                                 Cold Cafe Mocha  
                                 </a>
                              </div>
                              <div class="panel-body category_submenu">
                                 <a href="/collections/hot-coffee" class="dropdown-item">
                                 Cold brew coffee  
                                 </a>
                              </div>
                              <div class="panel-body category_submenu">
                                 <a href="/collections/frappe" class="dropdown-item">
                                 iced americano  
                                 </a>
                              </div>
                           </div> -->
                        </div>
                        <?php } ?>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>